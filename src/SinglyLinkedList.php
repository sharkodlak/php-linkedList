<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink;

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

    public function last(): self
    {
        $lastNode = $this;

        while ($lastNode->nextNode !== null && $lastNode->nextNode !== $this) {
            $lastNode = $lastNode->nextNode;
        }

        return $lastNode;
    }

    public function next(): ?self
    {
        return $this->nextNode;
    }

    /** @return array<int,int|string> */
    public function toArray(): array
    {
        $array = [];
        $lastNode = $this;

        do {
            $array[] = $lastNode->value;
            $lastNode = $lastNode->nextNode;
        } while ($lastNode !== null && $lastNode !== $this);

        return $array;
    }
}
