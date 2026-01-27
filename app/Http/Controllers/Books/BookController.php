<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

            $book = Book::create($data);
            return response()->json($book->toResource(), 201);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return response()->json(['message' => 'Erro ao criar o livro'], 500);
        }
    }
}
