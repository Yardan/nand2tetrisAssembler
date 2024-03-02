<?php
namespace Tests\Unit\Instruction\C;
use App\Instruction\C\Parser;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    protected Parser $parser;
    protected function setUp(): void
    {
        parent::setUp();
        $this->parser = new Parser();
    }

    /**
     * @dataProvider dataProvider
     * @param $cmd
     * @param $c
     * @param $d
     * @param $j
     * @return void
     */
    public function testPositive($cmd, $c, $d, $j)
    {
        $this->parser->parse($cmd);
        $this->assertEquals($c, $this->parser->getComp());
        $this->assertEquals($d, $this->parser->getDest());
        $this->assertEquals($j, $this->parser->getJump());
    }
    public function dataProvider(): array
    {
        return [
            ['D=A', 'A', 'D', null],
            ['D=D+A', 'D+A', 'D', null],
            ['AM=M-1', 'M-1', 'AM', null],
            ['D;JGT', 'D', null, 'JGT'],
            ['0;JMP', '0', null, 'JMP'],
        ];
    }
}