<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends AbstractModel
{
    use HasFactory;

    protected array $textFields = ['name'];
    protected array $numericFields = ['exp'];

    protected $fillable = ['name', 'profile_id', 'exp'];

    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
