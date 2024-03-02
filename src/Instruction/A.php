<?php

namespace App\Instruction;
class A extends Instruction
{
    public function toBinary(): string
    {
        return sprintf('%016b', substr($this->asmInstruction, 1));
    }
}