<?php

namespace App\Models;

use App\Enum\CrawlSiteStatus;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class CrawlSite extends Model
{
    use AsSource;

    protected $table = 'crawl_sites';
    protected $fillable = [
        'link',
        'status',
    ];

    protected $casts = [
        'status' => CrawlSiteStatus::class

    ];

    function getStatus($id){
        $site = CrawlSite::where('id', $id)->firstOrFail();
        return $site['status'];
    }

}
