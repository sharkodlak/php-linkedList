<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink\Factory;

use Sharkodlak\Phlink\LinkedList;

interface Factory
{
    public function getInstance(int|string $value): LinkedList;
}
