<?php

declare(strict_types=1);

namespace Sharkodlak\Phlink;

interface LinkedList
{
    public function getValue(): int|string;
    public function add(int|string $nextValue): self;
    public function next(): ?self;
    public function last(): self;

    /** @return array<int,int|string> */
    public function toArray(): array;
}
