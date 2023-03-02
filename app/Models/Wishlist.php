<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Wishlist extends Model
{
    use HasFactory, AsSource;

    protected $fillable = [
      'id_post',
      'id_user',
    ];

}
