<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;

    protected $fillable = ['nomer', 'linkwa', 'slug', 'email', 'sekret', 'kontak_id'];
}
