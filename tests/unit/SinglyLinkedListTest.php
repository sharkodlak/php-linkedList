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

    public function testAppend(): void
    {
        $phlink = new SinglyLinkedList(1);
        $second = $phlink->append(2);
        $this->assertSame(2, $second->getValue());
    }

    public function testNext(): void
    {
        $phlink = new SinglyLinkedList(1);
        $phlink->append(2);
        $this->assertSame(2, $phlink->next()->getValue());
    }

    public function testGetIterator(): void
    {
        $phlink = new SinglyLinkedList(1);
        $phlink->append(2);
        $iterator = $phlink->getIterator();
        $this->assertInstanceOf(\Iterator::class, $iterator);
    }

    public function testAddInTheMiddle(): void
    {
        $phlink = new SinglyLinkedList(1);
        $two = $phlink->append(2);
        $two->append(4);
        $two->append(3);

        $actual = \array_map(
            fn(SinglyLinkedList $node) => $node->getValue(),
            \iterator_to_array($phlink->getIterator())
        );
        $this->assertSame([1, 2, 3, 4], $actual);
    }
}
