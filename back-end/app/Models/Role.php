<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    const ADMIN = 1;
    const USER = 2;
    const WORKER_ID = 3;
    const OWNER = 'owner';
    const STAFF_ID = 5;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
