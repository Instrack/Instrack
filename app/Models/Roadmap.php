<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    use HasFactory;

    public function Team()
    {
        return $this->belongsTo(Team::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Task()
    {
        return $this->hasMany(Task::class);
    }
}
