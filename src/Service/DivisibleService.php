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

    /**
     * @param int $number
     * @return bool
     */
    public function isPrime(int $num) :bool
    {
        //Did find this from a web page simply for speed of not wanting to write my own method
        // https://www.tutorialspoint.com/php-program-to-check-if-a-number-is-prime-or-not
        // 1 is not prime
        if ($num === 1) {
            return false;
        }
        for ($i = 2; $i <= $num/2; $i++) {
            if ($num % $i === 0) {
                return false;
            }
        }
        return true;
    }
}
