<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink;

/** @implements \Iterator<int,int|string> */
class LinkedListIterator implements \Iterator
{
    private int $key;
    private ?LinkedList $currentNode;

    public function __construct(
        private LinkedList $startNode
    ) {
    }

    public function next(): void
    {
        \assert($this->currentNode !== null);
        $this->currentNode = $this->currentNode->next();
    }

    public function key(): int
    {
        return $this->key;
    }

    public function valid(): bool
    {
        return $this->currentNode !== null;
    }

    public function rewind(): void
    {
        $this->key = 0;
        $this->currentNode = $this->startNode;
    }

    public function current(): int|string
    {
        \assert($this->currentNode !== null);
        return $this->currentNode->getValue();
    }
}
