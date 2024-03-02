<?php

namespace App;
class SymbolTable
{
    protected array $symbols = [
        'R0'    => 0,
        'R1'    => 1,
        'R2'    => 2,
        'R3'    => 3,
        'R4'    => 4,
        'R5'    => 5,
        'R6'    => 6,
        'R7'    => 7,
        'R8'    => 8,
        'R9'    => 9,
        'R10'   => 10,
        'R11'   => 11,
        'R12'   => 12,
        'R13'   => 13,
        'R14'   => 14,
        'R15'   => 15,
        'SCREEN' => 16384,
        'KBD'   => 24576,
        'SP'    => 0,
        'LCL'   => 1,
        'ARG'   => 2,
        'THIS'  => 3,
        'THAT'  => 4
    ];

    protected static int $count = 16;

    public function addLabel(string $name, int $address): self
    {
        if (!array_key_exists($name, $this->symbols)) {
            $this->symbols[$name] = $address;
        }
        return $this;
    }

    public function getVariableValue(string $name): int
    {
        return $this->symbols[$name] ?? $this->addVariable($name);
    }

    protected function addVariable(string $name):int
    {
        $this->symbols[$name] = self::$count++;
        return $this->symbols[$name];
    }

    public function getTable():array
    {
        return $this->symbols;
    }

    public function isset(string $symbol): bool
    {
        return isset($this->symbols[$symbol]);
    }
}