<?php

namespace App\Service;

/**
 * Class DivisibleService
 * @package App\Service
 */
class DivisibleService
{

    /**
     * @param int $target
     * @param int $divisibleBy
     * @return bool
     */
    public function isDivisible(int $target, int $divisibleBy): bool
    {
       return ($target % $divisibleBy) === 0;
    }
}
