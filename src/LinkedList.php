<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink;

interface LinkedList
{
    public function newNode(int|string $value): self;

    public function getValue(): int|string;
    public function append(int|string $value): self;
    public function appendNode(self $node): self;
    public function last(): self;
    public function next(): ?self;
}
