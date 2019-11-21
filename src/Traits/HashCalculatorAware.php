<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Traits;

use NatePage\EasySsm\Services\Hash\HashCalculatorInterface;

trait HashCalculatorAware
{
    /** @var \NatePage\EasySsm\Services\Hash\HashCalculatorInterface */
    protected $hashCalculator;

    /**
     * Set hash calculator.
     *
     * @param \NatePage\EasySsm\Services\Hash\HashCalculatorInterface $hashCalculator
     *
     * @return void
     *
     * @required
     */
    public function setHashCalculator(HashCalculatorInterface $hashCalculator): void
    {
        $this->hashCalculator = $hashCalculator;
    }
}
