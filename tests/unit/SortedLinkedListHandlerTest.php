<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Sharkodlak\Phlink\Comparator\ScalarValuesComparator;
use Sharkodlak\Phlink\Factory\SinglyLinkedListFactory;
use Sharkodlak\Phlink\Handler\SortedLinkedListHandler;
use Sharkodlak\Phlink\SinglyLinkedList;

class SortedLinkedListHandlerTest extends TestCase
{
    /*public function testAdd(): void
    {
        $listFactory = new SinglyLinkedListFactory();
        $comparator = new ScalarValuesComparator();
        $sortedListHandler = new SortedLinkedListHandler($listFactory, $comparator);
        $actual = $sortedListHandler->add(1);
        $this->assertSame($sortedListHandler, $actual);
    }*/

    /**
     * @dataProvider addProvider
     */
    public function testAddMultiple($expected, $values): void
    {
        $listFactory = new SinglyLinkedListFactory();
        $comparator = new ScalarValuesComparator();
        $sortedListHandler = new SortedLinkedListHandler($listFactory, $comparator);

        foreach ($values as $value) {
            $sortedListHandler->add($value);
        }

        $actual = \array_map(
            fn(SinglyLinkedList $node) => $node->getValue(),
            \iterator_to_array($sortedListHandler->getIterator())
        );

        $this->assertSame($expected, $actual);
    }

    public static function addProvider(): array
    {
        return [
            'two values' => [[1, 2], [1, 2]],
            'reverse order' => [[1, 2], [2, 1]],
            'three values' => [[1, 2, 3], [2, 3, 1]],
            'multiple values' => [[1, 2, 3, 4], [3, 2, 4, 1]],
        ];
    }
}
