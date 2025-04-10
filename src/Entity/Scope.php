<?php

namespace App\Entity;

/**
 * Simple demo enum
 */
enum Scope: int
{
    case Global = 1;
    case Private = 2;
}
