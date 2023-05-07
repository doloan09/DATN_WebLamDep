<?php

namespace App\Enum;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

class CrawlSiteStatus extends Enum
{
    #[Description('Crawl')]
    public const Crawl = 1;

    #[Description('Stopped')]
    public const Stop = 0;
}
