<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function staff()
    {
        return $this->hasMany(User::class)->where('role_id', Role::STAFF_ID);
    }

    public function workers()
    {
        return $this->hasMany(User::class)
            ->whereIn('role_id', [Role::WORKER_ID, Role::STAFF_ID]);
    }

    public function services()
    {
        return $this->hasManyThrough(Service::class, User::class);
    }
}
