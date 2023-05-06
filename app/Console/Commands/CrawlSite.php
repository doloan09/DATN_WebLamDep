<?php

namespace App\Console\Commands;

use App\Jobs\CrawlJob;
use App\Models\CrawlSite as CrawlSiteModel;
use Illuminate\Console\Command;

class CrawlSite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl-site';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $listUrl = CrawlSiteModel::where('status', 1)->get();
        foreach ($listUrl as $item){
            CrawlJob::dispatch($item['link']);
        }
        return true;
    }
}
