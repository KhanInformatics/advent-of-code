<?php

// Set file path
$filename = 'input.txt';

// Check if file exists
if (!file_exists($filename)) {
    die("Error: input.txt not found.\n");
}

// Read file contents
$input = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if ($input === false || count($input) === 0) {
    die("Error: input.txt is empty or cannot be read.\n");
}

// Parse the input
$left = [];
$right = [];

foreach ($input as $line) {
    $parts = explode(' ', trim($line));
    if (count($parts) !== 2) {
        die("Error: Invalid line format in input.txt\n");
    }
    list($l, $r) = $parts;
    $left[] = (int)$l;
    $right[] = (int)$r;
}

// Sort both arrays
sort($left);
sort($right);

// Calculate total distance
$totalDistance = 0;
for ($i = 0; $i < count($left); $i++) {
    $totalDistance += abs($left[$i] - $right[$i]);
}

// Output the result
echo "Total Distance: $totalDistance\n";

?>
