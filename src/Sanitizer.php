<?php

namespace App;
class Sanitizer
{
    public function sanitize(array $asmFile): array
    {
        $resultArray = [];
        foreach ($asmFile as $line) {
            $line = trim($line);

            // skip empty lines
            if (empty($line)) {
                continue;
            }

            // skip comments
            if (preg_match('/^\s*\/\/.*$/i', $line)) {
                continue;
            }

            // delete inline comments
            if (strpos($line, '//')) {
                $line = trim(explode('//', $line)[0]);
            }

            $resultArray[] = $line;
        }

        return $resultArray;
    }
}