<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink;

interface ValuesComparator
{
    public function cmp(mixed $a, mixed $b): int;
}
