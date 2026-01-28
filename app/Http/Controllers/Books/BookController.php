<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\borrowAndReturnResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Loan;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return response()->json($books->toResourceCollection(), 200);
    }

    public function store(BookRequest $request) {

        try {
            // precisa criar o arquivo de request BookStoreRequest, da qual lida com as validações
            $data = $request->validated();

            if ( $data ) {
                $existingBook = Book::where('isbn', $data['isbn'])->first();
                if ($existingBook) {
                    return response()->json(['message' => 'Livro com este ISBN já existe'], 422);
                }
            } else {
                return response()->json(['message' => 'Dados inválidos'], 422);
            }

            $book = Book::create($data);
            return response()->json($book->toResource(), 201);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return response()->json(['message' => 'Erro ao criar o livro'], 500);
        }
    }

    public function borrowBook(Request $request, $id) {

        try {
            $book = Book::findOrFail($id);

            if (!$book->status) {
                return response()->json(['message' => 'livro indisponível para empréstimo'], 400);
            };

            $book->status = false;
            $loan = new Loan();
            $loan->book_id = $book->id;
            $loan->borrower_name = $request->input('borrower_name');
            $loan->loan_date = now();

            $loan->save();
            $book->save();
            return response()->json(['message' => 'Livro emprestado com sucesso', 'data' => new borrowAndReturnResource($loan)], 200);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Erro ao emprestar o livro'], 500);
        }
    }

    public function returnBook(Request $request, $id) {
        try {
            $book = Book::findOrFail($id);

            if ($book->status) {
                return response()->json(['message' => 'Livro já está disponível na biblioteca'], 400);
            }

            $book->status = true;
            $loan = Loan::where('book_id', $book->id)->whereNull('return_date')->first();

            if (!$loan) {
                return response()->json(['message' => 'Nenhum empréstimo ativo encontrado para este livro'], 404);
            }
            
            $loan->return_date = now();
            $loan->save();
            $book->save();
            return response()->json(['message' => 'Livro devolvido com sucesso', 'data' => new borrowAndReturnResource($loan)], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao devolver o livro'], 500);
        }
    }
}
