# Palette Generator

A PHP library for generating tailwind v4 color palettes from a hexadecimal color.

## Installation

```bash
composer require charlieetienne/palette-generator
```

## Requirements

This package only requires PHP 8.4.

For Laravel users, this package will be auto-detected thanks to `PaletteGeneratorServiceProvider`.

## Usage

```php
use CharlieEtienne\PaletteGenerator\PaletteGenerator;

// Generate a Tailwind 4 like palette from a hex color
$palette = PaletteGenerator::generatePalette('#3b82f6');

// Returns this array:
// [
//    50 => "oklch(0.97 0.014 254.604)"
//    100 => "oklch(0.932 0.027 255.585)"
//    200 => "oklch(0.882 0.045 254.128)"
//    300 => "oklch(0.809 0.084 251.813)"
//    400 => "oklch(0.707 0.14 254.624)"
//    500 => "oklch(0.623 0.188 259.815)"
//    600 => "oklch(0.546 0.22 262.881)"
//    700 => "oklch(0.488 0.222 264.376)"
//    800 => "oklch(0.424 0.185 265.638)"
//    900 => "oklch(0.379 0.141 265.522)"
//    950 => "oklch(0.282 0.091 267.935)"
// ]
```

## How it works

This package was inspired by [uihue](https://www.uihue.com/) from Matteo Frana.
The author has explained how it was doing in an article called ["The Mystery of Tailwind Colors (v4)"](https://dev.to/matfrana/the-mystery-of-tailwind-colors-v4-hjh), but the short version is:

1. Use the DeltaE 2000 algorithm to iterate through the Tailwind CSS colors and find the nearest match
2. Apply this delta with a smoothing effect as we approach the extreme light and dark hues to preserve the color's distinctive features.

I just tried to do the same but with php.

## Perfs

Due to the algorithm itself, it might be more resource-intensive than other solutions.

Here are some benchmarks:

`CharlieEtienne\PaletteGenerator::generatePalette('#ad70e5')`
- Execution time: ~0.00012 seconds per run
- Benchmark speed: ~8,155 ops/sec

Tests were done on a MB Air M2, inside a Laravel app.

To improve performance, you might want to cache the results.

## Contribute

Your PR is welcome!