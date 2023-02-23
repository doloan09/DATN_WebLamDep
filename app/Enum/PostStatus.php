<?php

namespace App\Enum;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

class PostStatus extends Enum
{
    #[Description('Bài viết nổi bật')]
    public const Active = 1;

    #[Description('Bài viết bình thường')]
    public const UnActive = 0;
}
