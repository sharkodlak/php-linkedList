<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink\Handler;

use Sharkodlak\Phlink\Comparator\ValuesComparator;
use Sharkodlak\Phlink\Factory\Factory;
use Sharkodlak\Phlink\Iterator\LinkedListIterator;
use Sharkodlak\Phlink\LinkedList;

/** @implements \IteratorAggregate<int,LinkedList> */
class SortedLinkedListHandler implements \IteratorAggregate
{
    protected LinkedList $node;

    public function __construct(
        private Factory $factory,
        private ValuesComparator $comparator
    ) {
    }

    public function add(int|string $value): self
    {
        if (!isset($this->node)) {
            $this->node = $this->factory->getInstance($value);
        } else {
            $previousNode = null;
            $lastNode = $this->node->last();

            foreach ($this->node as $nodeToCompare) {
                if ($this->comparator->cmp($value, $nodeToCompare->getValue()) < 0) {
                    if ($previousNode === null) {
                        $this->node = $nodeToCompare->prepend($value);
                    } else {
                        $previousNode->append($value);
                    }

                    break;
                } elseif ($nodeToCompare === $lastNode) {
                    $nodeToCompare->append($value);
                    break;
                }

                $previousNode = $nodeToCompare;
            }
        }

        return $this;
    }

    public function getIterator(): \Traversable
    {
        return new LinkedListIterator($this->node ?? null);
    }
}
