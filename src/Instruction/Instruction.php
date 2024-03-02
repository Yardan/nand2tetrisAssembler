<?php

namespace App\Instruction;

abstract class Instruction
{
    protected string $asmInstruction;

    /**
     * @param string $asmInstruction
     */
    public function __construct(string $asmInstruction)
    {
        $this->asmInstruction = $asmInstruction;
    }

    abstract public function toBinary(): string;
}