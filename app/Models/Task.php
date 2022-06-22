<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Roadmap()
    {
        return $this->belongsTo(Roadmap::class);
    }

    public function Team()
    {
        return $this->belongsTo(Team::class);
    }
}
