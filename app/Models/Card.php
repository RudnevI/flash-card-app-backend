<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends AbstractModel
{
    use HasFactory;

    protected $fillable = ['name', 'question', 'correct_answer', 'collection_id', 'status_id', 'repeat_date'];

    protected array $textFields = ['name', 'question', 'correct_answer'];

}
