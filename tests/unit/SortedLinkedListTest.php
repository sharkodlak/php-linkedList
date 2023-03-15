<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Sharkodlak\Phlink\SinglyLinkedList;

class SortedLinkedListTest extends TestCase
{
    public function testAdd(): void
    {
        $phlink = new SinglyLinkedList(1);
        $sortedList = new SortedLinkedList($phlink);
        $second = $sortedList->add(2);
        $this->assertSame(2, $second->getValue());
    }

    public function testNext(): void
    {
        $phlink = new SinglyLinkedList(1);
        $sortedList = new SortedLinkedList($phlink);
        $sortedList->add(2);
        $this->assertSame(2, $sortedList->next()->getValue());
    }
}
