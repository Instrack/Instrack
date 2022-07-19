<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    public function Repository()
    {
        return $this->belongsTo(Repository::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'open' => 'boolean',
    ];
}
