<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends AbstractModel
{
    use HasFactory;

    protected $fillable = ['name', 'question', 'answer'];

    protected array $textFields = ['name', 'question', 'answer'];

}
