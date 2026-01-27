<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'book_id',
        'borrower_name',
        'loan_date',
        'return_date',
    ];

    // este emprestimo pertence a um livro
    public function book() {
        return $this->belongsTo(Book::class);
    }
}
