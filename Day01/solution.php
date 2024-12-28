<?php
// Input file name
$filename = 'input.txt';

// Check if the input file exists
if (!file_exists($filename)) {
    die("Error: Input file '$filename' not found.\n");
}

// Read the file contents into an array
$input = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if ($input === false) {
    die("Error: Failed to open input file.\n");
}

// Initialize variables
$totalDistance = 0;
$left = [];
$right = [];

// Process each line in the input file
foreach ($input as $line) {
    // Split the line into parts
    $parts = explode(' ', $line);

    // Ensure the line contains exactly two parts
    if (count($parts) !== 2) {
        die("Error: Invalid input format at line: $line\n");
    }

    // Parse the left and right values
    $l = (int)$parts[0];
    $r = (int)$parts[1];

    // Add values to respective arrays
    $left[] = $l;
    $right[] = $r;

    // Calculate the distance for this pair
    $distance = abs($l - $r);
    $totalDistance += $distance;

    // Debugging output
    echo "Processed: Left = $l, Right = $r, Distance = $distance\n";
}

// Final output
echo "Total Distance: $totalDistance\n";
?>
