<?php
namespace Tests\Unit;

use App\Sanitizer;
use PHPUnit\Framework\TestCase;
class SanitizerTest extends TestCase
{
    protected Sanitizer $sanitizer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sanitizer = new Sanitizer();
    }

    /**
     * @dataProvider dataProvider
     * @param $source
     * @param $dest
     * @return void
     */
    public function testSanitize($source, $dest)
    {
        $this->assertEquals($dest, $this->sanitizer->sanitize($source));
    }

    public function dataProvider(): array
    {
        return [
            [['//Test', '// desc', '', '@i //counter '], ['@i']],
            [['M=M+D // update ram', '@1 // RAM[1]'], ['M=M+D', '@1']],
        ];
    }
}