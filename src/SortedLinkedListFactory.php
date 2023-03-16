<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink;

class SortedLinkedListFactory
{
    public static function getSinglyLinkedList(
        int|string $firstValue,
        ValuesComparator $comparator
    ): SortedLinkedListDecorator {
        $firstNode = new SinglyLinkedList($firstValue);
        return new SortedLinkedListDecorator($firstNode, $comparator);
    }
}
