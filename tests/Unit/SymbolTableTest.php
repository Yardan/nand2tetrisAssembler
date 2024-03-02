<?php
namespace Tests\Unit;

use App\SymbolTable;
use PHPUnit\Framework\TestCase;

class SymbolTableTest extends TestCase
{

    protected SymbolTable $symbolTable;

    protected function setUp(): void
    {
        parent::setUp();
        $this->symbolTable = new SymbolTable();
    }

    /**
     * @dataProvider dataProviderLabel
     * @param $label
     * @param $address
     * @return void
     */
    public function testLabel($label, $address)
    {
        $this->symbolTable->addLabel($label, $address);
        $this->assertEquals($address, $this->symbolTable->getVariableValue($label));
    }

    /**
     * @dataProvider dataProviderVar
     * @param $var
     * @param $address
     * @return void
     */
    public function testVariable($var, $address)
    {
        $this->assertEquals($address, $this->symbolTable->getVariableValue($var));
    }

    public function dataProviderVar(): array
    {
        return [
            ['R1', 1],
            ['R15', 15],
            ['SCREEN', 16384],
            ['KBD', 24576],
            ['sum', 16],
            ['i', 17]
        ];
    }

    public function dataProviderLabel(): array
    {
        return [
            ['LOOP', 167],
            ['END', 22],
            ['STOP', 67],
        ];
    }
}
