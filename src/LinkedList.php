<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink;

/** @extends \IteratorAggregate<int,self> */
interface LinkedList extends \IteratorAggregate
{
    public function getValue(): int|string;
    public function append(int|string $value): self;
    public function appendNode(self $node): self;
    public function prepend(int|string $value): self;
    public function prependNode(self $node): self;
    public function next(): ?self;
    public function last(): self;
}
