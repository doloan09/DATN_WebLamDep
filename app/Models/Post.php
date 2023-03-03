<?php

namespace App\Models;

use App\Enum\PostStatus;
use Doloan09\Comments\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    use Commentable;

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

    /**
     * @return HasMany
     */
    public function wishlist(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'id_post');
    }
}
