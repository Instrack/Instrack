<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Repository()
    {
        return $this->belongsTo(Repository::class);
    }


}
