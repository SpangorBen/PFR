<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cost',
        'availability',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('code', 'redeemed_at')
                    ->withTimestamps();
    }
}
