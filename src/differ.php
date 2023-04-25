<?php

namespace Difference\Calculator\Differ;

function arraySort(array $item): array
{
    ksort($item);
    return $item;
}

function strValue(mixed $value): string
{
    if (is_bool($value)) {
        return $value ? 'true' : 'false';
    }
    return $value;
}

function genDiff(string $path1, string $path2)
{
    $json1 = json_decode(file_get_contents($path1), true);
    $json2 = json_decode(file_get_contents($path2), true);

    $test = "{\n" . implode(
        "\n", array_map(
            function ($key) use ($json1, $json2) {
                $status1 = array_key_exists($key, $json1);
                $status2 = array_key_exists($key, $json2);

                if ($status1 && $status2) {
                    if ($json1[$key] === $json2[$key]) {
                        return '    ' . $key . ': ' . strValue($json1[$key]);
                    }
                    $f = '  - ' . $key . ': ' . strValue($json1[$key]) . "\n";
                    $s = '  + ' . $key . ': ' . strValue($json2[$key]);
                    return $f . $s;
                } elseif ($status1) {
                    return '  - ' . $key . ': ' . strValue($json1[$key]);
                }
                return '  + ' . $key . ': ' . strValue($json2[$key]);
            }, array_keys(arraySort(array_merge($json1, $json2)))
        )
    ) . "\n}\n";

    print_r($test);
}
