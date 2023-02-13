<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Image extends Model
{
    use HasFactory, AsSource;

    protected $fillable = [
        'real_name',
        'link',
        'status',
        'id_folder',
    ];

}
