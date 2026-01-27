<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'status',
    ];

    // o livro pode ter muitos empréstimos
    public function loans() {
        return $this->hasMany(Loan::class);
    }
}
