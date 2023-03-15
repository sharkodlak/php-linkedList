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

    public function getValue(): int|string
    {
        return $this->value;
    }

    public function add(int|string $nextValue): self
    {
        $newNode = new self($nextValue);
        $newNode->nextNode = $this->nextNode;
        $this->nextNode = $newNode;
        return $newNode;
    }

    public function last(): self
    {
        $lastNode = $this;

        while ($lastNode->nextNode !== null) {
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
        $lastNode = $this;
        $array = [];

        while ($lastNode !== null) {
            $array[] = $lastNode->value;
            $lastNode = $lastNode->nextNode;
        }

        return $array;
    }
}
