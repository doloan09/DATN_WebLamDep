<?php

namespace App\Observers\Crawler;

use App\Models\Category;
use App\Models\Post;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;
use Spatie\Crawler\CrawlObservers\CrawlObserver as SpatieCrawlObserver;
use Symfony\Component\DomCrawler\Crawler;

class ConsoleObserver extends SpatieCrawlObserver
{

    public function __construct(\Illuminate\Console\Command $console)
    {
        $this->console = $console;
    }

    /**
     * @param UriInterface $url
     */
    public function willCrawl(UriInterface $url): void
    {
        $this->console->comment("Found: {$url}");
    }

    /**
     * Called when the crawler has crawled the given url successfully.
     *
     * @param UriInterface $url
     * @param ResponseInterface $response
     * @param UriInterface|null $foundOnUrl
     */
    public function crawled(UriInterface $url, ResponseInterface $response, ?UriInterface $foundOnUrl = NULL): void
    {
        $this->console->total_crawled++;

        $crawler = new Crawler((string)$response->getBody());

        $title = $this->crawlData('.post-title', $crawler);

        /// content
        $content = $this->crawlDataHtml('.post-body', $crawler);
        $content_list = explode('<h3 class="post-title entry-title" itemprop="name">', $content);
        $str = strstr($content_list[1], '</span></h2>');
        $str =  str_replace('</span></h2>', '', $str);
        $content = $content_list[0] . $str;

        //
        $link_image = "https://res.cloudinary.com/dsh5japr1/image/upload/v1682324127/L%C3%A0m%20%C4%91%E1%BA%B9p/y3itq6gmhik9gzojqmic.jpg";

        $id_category = Category::query()->where('slug', 'tham-khao')->first();
        if ($title) {
            $post = Post::query()->where('slug', Str::slug($title))->get();
        }

        ///data
        if ($title && $content && (count($post) === 0)) {
            $dataPost = [
                'title'       => $title,
                'slug'        => Str::slug($title),
                'content'     => $content,
                'link_image'  => $link_image,
                'status'      => 0,
                'id_category' => $id_category['id'],
            ];

            Post::query()->create($dataPost);
        }

        $this->console->info("Crawled: ({$this->console->total_crawled}) {$url} ({$foundOnUrl})");

        Log::info("Crawled: {$url} ({$foundOnUrl}) ");
    }

    protected function crawlData(string $type, $crawler)
    {
        $result = $crawler->filter($type)->each(function ($node) {
            return $node->text();
        });

        if(!empty($result)) {
            return $result[0];
        }

        return '';
    }

    protected function crawlDataHtml(string $type, $crawler)
    {
        $result = $crawler->filter($type)->each(function ($node) {
            return $node->html();
        });

        if(!empty($result)) {
            return $result[0];
        }

        return '';
    }

    /**
     * Called when the crawler had a problem crawling the given url.
     *
     * @param UriInterface $url
     * @param RequestException $requestException
     * @param UriInterface|null $foundOnUrl
     */
    public function crawlFailed(
        UriInterface $url,
        RequestException $requestException,
        ?UriInterface $foundOnUrl = null
    ): void
    {
        Log::error('crawlFailed',['url'=>$url,'error'=>$requestException->getMessage()]);
    }

    /**
     * Called when the crawl has ended.
     */
    public function finishedCrawling(): void
    {
        $this->console->info('Crawler: Finished');
    }
}
