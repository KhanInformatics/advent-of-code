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
    // Debug: Print the current line
    //echo "Line: $line\n";

    // Split the line into parts using regular expression to handle multiple spaces
    $parts = preg_split('/\s+/', $line);

    // Ensure the line contains exactly two parts
    if (count($parts) !== 2) {
        die("Error: Invalid input format at line: $line\n");
    }

    // Parse the left and right values
    $l = (int)$parts[0];
    $r = (int)$parts[1];
    $left[] = $l;
    $right[] = $r;
}

// Sort both lists
sort($left);
sort($right);

// Calculate the total distance
$totalDistance = 0;

for ($i = 0; $i < count($left); $i++) {
    $totalDistance += abs($left[$i] - $right[$i]);
}

// Output the result
echo $totalDistance;

// Debug: Print arrays
//print_r($left);
//print_r($right);
?>
