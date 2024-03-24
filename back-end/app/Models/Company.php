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
    protected $fillable = [
        'name',
        'owner_id',
        'description',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function staff()
    {
        return $this->hasMany(User::class)->where('role_id', Role::STAFF);
    }

    public function workers()
    {
        return $this->hasMany(User::class)->where('role_id', Role::WORKER);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
