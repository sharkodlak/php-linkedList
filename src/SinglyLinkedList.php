<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink;

use Traversable;

class SinglyLinkedList implements LinkedList
{
    private ?self $nextNode = null;

    public function __construct(
        private int|string $value
    ) {
    }

    public function newNode(int|string $value): self
    {
        return new self($value);
    }

    public function getValue(): int|string
    {
        return $this->value;
    }

    public function append(int|string $value): self
    {
        $node = new self($value);
        return $this->appendNode($node);
    }

    public function appendNode(LinkedList $node): self
    {
        \assert($node instanceof self);
        $node->nextNode = $this->nextNode;
        $this->nextNode = $node;
        return $node;
    }

    public function prepend(int|string $value): self
    {
        $node = new self($value);
        return $this->prependNode($node);
    }

    public function prependNode(LinkedList $node): self
    {
        \assert($node instanceof self);
        $node->appendNode($this);
        return $node;
    }

    public function next(): ?self
    {
        return $this->nextNode;
    }

    public function last(): self
    {
        $lastNode = $this;

        while ($lastNode->next() !== null && $lastNode->next() !== $this) {
            $lastNode = $lastNode->next();
        }

        return $lastNode;
    }

    public function getIterator(): Traversable
    {
        return new LinkedListIterator($this);
    }
}
