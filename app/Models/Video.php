<?php

namespace App\Models;

use Doloan09\Comments\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @property string $link_video
 * @property string $videoId
 * @property string $title
 * @property string $thumbnail
 * @property string $public_at
 * @property string $description
 * @property string $channel_id
 * @property string $channel_title
 * @property string $embed_html
 * @property string $duration
 * @property string $privacy_status
 * @property string $view_count
 * @property string $like_count
 * @property string $dislike_count
 * @property string $comment_count
 * @property string $slug
 *
 */
class Video extends Model
{
    use HasFactory, AsSource, Filterable, Commentable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'link_video',
        'video_id',
        'title',
        'thumbnail',
        'public_at',
        'description',
        'channel_id',
        'channel_title',
        'embed_html',
        'duration',
        'privacy_status',
        'view_count',
        'like_count',
        'dislike_count',
        'comment_count',
        'slug',
        'id_playlist',
    ];

}
