<?php

namespace App\Enum;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

class CrawlSiteStatus extends Enum
{
    #[Description('Đang được thu thập dữ liệu')]
    public const Crawl = 1;

    #[Description('Đã dừng thu thập dữ liệu')]
    public const Stop = 0;
}
