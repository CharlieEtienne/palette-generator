<?php

use CharlieEtienne\PaletteGenerator\PaletteGenerator;

it('generates correct palette for #3b82f6', function () {
    $palette = PaletteGenerator::generatePalette('#3b82f6');
    
    expect($palette)->toBe([
        50 => "oklch(0.97 0.014 254.604)",
        100 => "oklch(0.932 0.027 255.585)",
        200 => "oklch(0.882 0.045 254.128)",
        300 => "oklch(0.809 0.084 251.813)",
        400 => "oklch(0.707 0.14 254.624)",
        500 => "oklch(0.623 0.188 259.815)",
        600 => "oklch(0.546 0.22 262.881)",
        700 => "oklch(0.488 0.222 264.376)",
        800 => "oklch(0.424 0.185 265.638)",
        900 => "oklch(0.379 0.141 265.522)",
        950 => "oklch(0.282 0.091 267.935)",
    ]);
});