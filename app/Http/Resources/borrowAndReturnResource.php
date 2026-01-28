<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class borrowAndReturnResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'borrower_name' => $this->borrower_name,
            'book_id' => $this->book_id,
            
            'book_details' => [
                'title' => $this->book->title, // Isso assume que você tem public function book() no Model Loan
                'author' => $this->book->author,
            ],
            
            'loan_date' => $this->loan_date,
            'return_date' => $this->return_date,
        ];
    }
}
