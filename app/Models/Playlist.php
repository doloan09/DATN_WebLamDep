<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 *
 */
class Playlist extends Model
{
    use HasFactory, AsSource;

    protected $fillable = [
        'name',
        'slug',
    ];

}
