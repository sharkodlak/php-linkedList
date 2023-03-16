<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink\Factory;

use Sharkodlak\Phlink\SinglyLinkedList;

class SinglyLinkedListFactory implements Factory
{
    public function getInstance(int|string $firstValue): SinglyLinkedList
    {
        return new SinglyLinkedList($firstValue);
    }
}
