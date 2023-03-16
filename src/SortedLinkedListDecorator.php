<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink;

class SortedLinkedListDecorator implements LinkedList
{
    public function __construct(
        private LinkedList $node,
        private ValuesComparator $comparator
    ) {
    }

    public function getValue(): int|string
    {
        return $this->node->getValue();
    }

    public function append(int|string $nextValue): self
    {
        throw new PhlinkException("It's unsafe to append value in Sorted linked list, use method add() instead.");
    }

    public function appendNode(LinkedList $node): self
    {
        throw new PhlinkException("It's unsafe to append node in Sorted linked list, use method add() instead.");
    }

    public function last(): LinkedList
    {
        return $this->node->last();
    }

    /** @return array<int,int|string> */
    public function toArray(): array
    {
        return $this->node->toArray();
    }

    public function add(int|string $value): self
    {
        $nodeToCompare = $this->node;

        do {
            if ($this->comparator->cmp($value, $nodeToCompare->getValue()) < 0) {
                //$firstNode = $this->node->newNode($value);
                //$firstNode->appendNode($this->node);
                //$this->node = $firstNode;
                break;
            }

            $nodeToCompare = $nodeToCompare->next();
        } while ($nodeToCompare !== null && $nodeToCompare !== $this->node);

        return $this;
    }
}
