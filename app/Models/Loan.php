<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{   
    // $public $timestamps = false; // desabilita os timestamps automáticos sem mexer nas migrations.

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
