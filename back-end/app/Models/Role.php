<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    const ADMIN = 'admin';
    const USER = 'user';
    const WORKER = 'worker';
    const OWNER = 'owner';
    const STAFF = 'staff';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
