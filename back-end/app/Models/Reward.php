<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cost'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
