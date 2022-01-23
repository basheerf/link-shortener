<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortener extends Model
{
    use HasFactory;

    protected $fillable=['link','shortlink','user_id'];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
