<?php

namespace Tests\Unit\Instruction;

use App\Instruction\A;
use PHPUnit\Framework\TestCase;

class ATest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $asm
     * @param $binary
     * @return void
     */
    public function testBinary($asm, $binary)
    {
        $this->assertEquals($binary, (new A($asm))->toBinary());
    }

    public function dataProvider(): array
    {
        return [
            ['@0',  '0000000000000000'],
            ['@1',  '0000000000000001'],
            ['@10', '0000000000001010'],
            ['@16', '0000000000010000'],
            ['@100','0000000001100100'],
        ];
    }
}