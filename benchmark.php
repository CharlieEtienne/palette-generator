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

// Run actual benchmark
$benchmark = benchmark(fn() => PaletteGenerator::generatePalette('#3b82f6'));

echo "Calibration run: " . number_format($calibration) . " ops/sec\n";
echo "Benchmark run: " . number_format($benchmark) . " ops/sec\n";
echo 'Approximate code execution time (seconds): ' . number_format((1/$benchmark) - (1/$calibration), 10);
