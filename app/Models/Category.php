<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * @property int $id
 * @property string $name
 *
 */

class Category extends Model
{
    use HasFactory, AsSource;

    protected $fillable = [
        'name',
    ];

}
