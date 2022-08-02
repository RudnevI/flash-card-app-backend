<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends AbstractModel
{
    use HasFactory;

    protected $fillable = ['name'];
}
