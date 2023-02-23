<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * @property int $id
 * @property string $real_name
 * @property string $link
 * @property int $status
 * @property int $id_folder
 *
 */

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
