<?php

require __DIR__ . '/vendor/autoload.php';

use CharlieEtienne\PaletteGenerator\PaletteGenerator;

function benchmark($x): float
{
    $start = $t = microtime(true);
    $total = $c = $loop = 0;

    while (true) {
        $x();
        $c++;

        $now = microtime(true);
        if ($now - $t > 1) {
            $loop++;
            $total += $c;
            list($t, $c) = array(microtime(true), 0);
        }

        if ($now - $start > 2) {
            return round($total / $loop);
        }
    }
}

// Run calibration benchmark
$calibration = benchmark(function() {});
echo "Calibration: " . $calibration . ' ops/sec' . PHP_EOL;

// Run actual benchmark
$benchmark = benchmark(fn() => PaletteGenerator::generatePalette('#3b82f6'));
echo "Benchmark: " . $benchmark . ' ops/sec' . PHP_EOL;
