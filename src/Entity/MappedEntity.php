<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;

/**
 * Demo showing how doctrine mapping metadata affects open api output.
 * Issues are:
 * - id is falsely typed as integer but not nullable
 * - dateCreated is documented as nullable
 * - scope is documented as nullable
 * - not all properties are required by default but none is ignored
 */
#[Entity]
class MappedEntity extends BaseEntity
{

    #[Column]
    protected string $name;

    #[Column(type: "integer", nullable: true)]
    protected ?int $age;

    // Changing to nullable: false also makes scope non nullable in oa output
    #[Column(enumType: Scope::class, nullable: true)]
    protected ?Scope $scope;



    // Never returns null so it cannot possibly evaluate to ?Scope on runtime without crashing (as far as I know)
    public function getScope(): Scope
    {
        return $this->scope ?? Scope::Global;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }



}