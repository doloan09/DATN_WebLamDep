<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrawlSite extends Model
{
    protected $table = 'crawl_sites';
    protected $fillable = [
        'link',
        'status',
    ];

    function getStatus($id){
        $site = CrawlSite::where('id', $id)->firstOrFail();
        return $site['status'];
    }

}
