<?php

namespace App\Entity;
use OpenApi\Attributes as OA;

/**
 * Basic entity without mapping to show how constructor defaults seem to affect OA output for properties
 */
class TestEntity
{
    protected ?int $id;

    protected NestedEntity $sub;

    // I think $sub being nullable here is whats causing it to be nullable in OA doc
    public function __construct(?int $id = null, ?NestedEntity $sub = null)
    {
        $this->id = $id ?? 1;
        $this->sub = $sub ?? new NestedEntity;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSub(): NestedEntity
    {
        return $this->sub;
    }

}