<?php

namespace Tests\Unit;

use App\Asm;
use PHPUnit\Framework\TestCase;

class AsmTest  extends TestCase
{
    public function testToBinary()
    {
        $assembler = new Asm(new \App\SymbolTable(), new \App\InstructionTranslator());
        $asmList = explode(PHP_EOL, $this->getAsmCode());
        $this->assertEquals($this->getAsmBinary(), implode(PHP_EOL, $assembler->toBinary($asmList)));
    }


    protected function getAsmBinary()
    {
        return'0000000000000000
1111110000010000
0000000000000001
1111010011010000
0000000000001100
1110001100000001
0000000000000001
1111110000010000
0000000000000010
1110001100001000
0000000000010000
1110101010000111
0000000000000000
1111110000010000
0000000000000010
1110001100001000
0000000000010000
1110101010000111';
    }

    protected function getAsmCode(): string
    {
        return '// This file is part of www.nand2tetris.org
// and the book "The Elements of Computing Systems"
// by Nisan and Schocken, MIT Press.
// File name: projects/06/max/Max.asm

// Computes R2 = max(R0, R1)  (R0,R1,R2 refer to RAM[0],RAM[1],RAM[2])

   // D = R0 - R1
   @R0
   D=M
   @R1
   D=D-M
   // If (D > 0) goto ITSR0
   @ITSR0
   D;JGT
   // Its R1
   @R1
   D=M
   @R2
   M=D
   @END
   0;JMP
(ITSR0)
   @R0             
   D=M
   @R2
   M=D
(END)
   @END
   0;JMP';
    }
}