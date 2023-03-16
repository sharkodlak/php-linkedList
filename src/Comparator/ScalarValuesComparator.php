<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink\Comparator;

class ScalarValuesComparator implements ValuesComparator
{
    public function cmp(mixed $a, mixed $b): int
    {
        return $a <=> $b;
    }
}
