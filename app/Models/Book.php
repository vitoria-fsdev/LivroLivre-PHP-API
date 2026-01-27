<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{   
    use HasFactory;

    // $public $timestamps = false; // desabilita os timestamps automáticos sem mexer nas migrations.

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
