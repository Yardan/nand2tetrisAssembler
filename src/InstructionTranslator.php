<?php

namespace App;

use App\Instruction\A;
use App\Instruction\C;

class InstructionTranslator
{
    public function toBinary($asmInstruction): string
    {
        if ($this->isInstructionTypeA($asmInstruction)) {
            return (new A($asmInstruction))->toBinary();
        }

        return (new C($asmInstruction))->toBinary();
    }

    protected function isInstructionTypeA(string $instruction): string
    {
        return preg_match('/^@.+$/i', $instruction);
    }
}