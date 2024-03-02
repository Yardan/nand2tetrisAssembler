<?php

namespace App;

class Asm
{
    protected SymbolTable $symbolTable;
    protected InstructionTranslator $translator;

    /**
     * @param SymbolTable $symbolTable
     * @param InstructionTranslator $translator
     */
    public function __construct(SymbolTable $symbolTable, InstructionTranslator $translator)
    {
        $this->symbolTable = $symbolTable;
        $this->translator = $translator;
    }

    public function toBinary(array $asmList): array
    {
        $commandList = $this->replaceVariables(
            $this->deleteLabelsAddToSymbolTable($this->sanitize($asmList))
        );
        return $this->translate($commandList);
    }

    /**
     * @param array $commandsList
     * @return array
     */
    protected function deleteLabelsAddToSymbolTable(array $commandsList): array
    {
        $asmWithoutLabel = [];
        $asmCommandCount = 0;

        foreach ($commandsList as $item) {
            if (!preg_match('/^\((?<label>.*)\)$/i', $item, $matches)) {
                $asmWithoutLabel[] = $item;
                $asmCommandCount++;
                continue;
            }
            $this->symbolTable->addLabel($matches['label'], $asmCommandCount);
        }

        return $asmWithoutLabel;
    }

    /**
     * @param array $commandsList
     * @return array
     */
    protected function replaceVariables(array $commandsList): array
    {
        $resultArray = [];

        // Add variables
        foreach ($commandsList as $item) {
            if (preg_match('/^@(?<instr>.+)$/i', $item, $matches)) {
                if (is_numeric($matches['instr'])) {
                    $resultArray[] = $item;
                } else {
                    $resultArray[] = '@' . $this->symbolTable->getVariableValue($matches['instr']);
                }
            } else {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }

    protected function translate(array $asmList): array
    {
        $result = [];
        foreach ($asmList as $line ) {
            $result[] = $this->translator->toBinary($line);
        }
        return $result;
    }

    protected function sanitize(array $asmFile): array
    {
        return (new Sanitizer())->sanitize($asmFile);
    }
}