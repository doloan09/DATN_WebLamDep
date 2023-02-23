<?php

namespace App\Models;

use App\Enum\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * @property string $title
 * @property int $id
 * @property string $content
 * @property string $id_category
 * @property string $status
 * @property string $description
 * @property string $link_image
 *
 */

class Post extends Model
{
    use HasFactory, AsSource;

    protected $fillable = [
        'title',
        'content',
        'id_category',
        'status',
        'description',
        'link_image'
    ];

    protected $casts = [
        'status' => PostStatus::class,

    ];
}
