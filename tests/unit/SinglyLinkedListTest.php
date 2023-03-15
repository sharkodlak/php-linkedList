<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Sharkodlak\Phlink\SinglyLinkedList;

class SinglyLinkedListTest extends TestCase
{
    public function testGetValue(): void
    {
        $phlink = new SinglyLinkedList(7);
        $this->assertSame(7, $phlink->getValue());
    }

    public function testAdd(): void
    {
        $phlink = new SinglyLinkedList(1);
        $second = $phlink->add(2);
        $this->assertSame(2, $second->getValue());
    }

    public function testNext(): void
    {
        $phlink = new SinglyLinkedList(1);
        $phlink->add(2);
        $this->assertSame(2, $phlink->next()->getValue());
    }

    public function testToArray(): void
    {
        $phlink = new SinglyLinkedList(1);
        $phlink->add(2);
        $this->assertSame([1, 2], $phlink->toArray());
    }

    public function testAddInTheMiddle(): void
    {
        $phlink = new SinglyLinkedList(1);
        $two = $phlink->add(2);
        $four = $two->add(4);
        $two->add(3);

        $this->assertSame([1, 2, 3, 4], $phlink->toArray());
    }
}
