<?php
require_once 'vendor/autoload.php';

$asmFile = $argv[1];
$hackFile = $argv[2];
writeHack(proccess(readAsm($asmFile)), $hackFile);


function readAsm(string $asmFile): array {
    return file($asmFile, FILE_SKIP_EMPTY_LINES);
}

function writeHack(string $binaryString, string $name)
{
    file_put_contents($name, $binaryString);
}

function proccess(array $asmList): string
{
    $asm = new \App\Asm(new \App\SymbolTable(), new \App\InstructionTranslator());
    return implode(PHP_EOL, $asm->toBinary($asmList));
}