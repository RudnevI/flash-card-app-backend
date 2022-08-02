<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends AbstractModel
{
    use HasFactory;

    protected array $textFields = ['name'];

    protected array $numericFields = ['exp'];

    protected $fillable = ['name', 'exp'];

}
