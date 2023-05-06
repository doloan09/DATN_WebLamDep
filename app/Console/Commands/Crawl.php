<?php

namespace App\Console\Commands;

use App\Observers\Crawler\ConsoleObserver;
use App\Queues\ModelQueue;
use Illuminate\Console\Command;
use Spatie\Crawler\Crawler;
use Spatie\Crawler\CrawlProfiles\CrawlInternalUrls;

class Crawl extends Command
{
    public int $total_crawled = 0;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl {site}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepares and runs the crawler';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $queue = null;
        $site = $this->argument('site');

        if (is_null($queue)) {
            $this->info('Preparing a new crawler queue');

            $queue = new ModelQueue(86400); // one day
        }

        // Crawler
        $this->info('Start crawling');

        if ($queue->getPendingUrl()) {
            $site = (string)$queue->getPendingUrl()->url;
        }

        Crawler::create()
            ->setParseableMimeTypes(['text/html', 'text/plain'])
            ->addCrawlObserver(new ConsoleObserver($this))
            ->setCurrentCrawlLimit(20)
            ->setConcurrency(20)
            ->setCrawlQueue($queue)
            ->setCrawlProfile(new CrawlInternalUrls($site))
            ->startCrawling($site);

        $this->info('Finished crawling');

        if ($queue->hasPendingUrls()) {
            $this->alert('Has URLs left');
        } else {
            $this->info('Has no URLs left');
        }

        return 0;
    }
}
