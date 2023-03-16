<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink\Factory;

use Sharkodlak\Phlink\SinglyLinkedList;

interface IteratorFactory
{
    public function getInstance(): \Iterator;
}
