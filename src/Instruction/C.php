<?php

namespace App\Instruction;
use App\Instruction\C\Coder;
use App\Instruction\C\Parser;

class C extends Instruction
{
    protected Parser $parser;
    protected Coder $coder;

    public function __construct(string $asmInstruction)
    {
        $this->parser = new Parser();
        $this->coder = new Coder();
        parent::__construct($asmInstruction);
    }

    /**
     * @return string
     */
    public function toBinary():string
    {
        $this->parser->parse($this->asmInstruction);
        return '111' .
            $this->coder->getComp($this->parser->getComp()) .
            $this->coder->getDest($this->parser->getDest()) .
            $this->coder->getJump($this->parser->getJump());
    }
}