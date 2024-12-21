<?php

namespace App\Tests\Fixtures\Builder;

interface BuilderInterface
{
    public function build(bool $persist = true): object;
}