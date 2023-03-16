<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink\Iterator;

use Sharkodlak\Phlink\LinkedList;

/** @implements \Iterator<int,LinkedList> */
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
        $nextNode = $this->currentNode->next();
        $this->currentNode = $nextNode !== $this->startNode ? $nextNode : null;
        $this->key++;
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

    public function current(): LinkedList
    {
        \assert($this->currentNode !== null);
        return $this->currentNode;
    }
}
