<?php
namespace App\Instruction\C;
class Parser
{
    protected const DEST = 'dest';
    protected const COMP = 'comp';
    protected const JUMP = 'jmp';

    protected array $commandParts;

    /**
     * /^(?:(?<dest>[A-Z]+)=)?(?<comp>[^;]+)(?:;(?<jmp>[A-Z]+))?$/i
     * @return string
     */
    protected function getRegexp(): string
    {
        return '/^(?:(?<' . self::DEST . '>[A-Z]+)=)?(?<' . self::COMP
            . '>[^;]+)(?:;(?<' . self::JUMP . '>[A-Z]+))?$/i';
    }

    /**
     * @param string $command
     * @return array
     */
    public function parse(string $command): array
    {
        if (preg_match($this->getRegexp(), $command, $matches)) {
            foreach ([self::DEST, self::COMP, self::JUMP] as $item) {
                if (isset($matches[$item]) && $matches[$item] !== '') {
                    $this->commandParts[$item] = $matches[$item];
                }
            }
        }

        return $this->commandParts;
    }

    public function getDest()
    {
        return $this->commandParts[self::DEST] ?? null;
    }

    public function getComp()
    {
        return $this->commandParts[self::COMP] ?? null;
    }

    public function getJump()
    {
        return $this->commandParts[self::JUMP] ?? null;
    }
}