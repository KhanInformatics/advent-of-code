<?php

// Display the current working directory
echo "Current Working Directory: " . getcwd() . "\n";

// Read input from a file
$input = file_get_contents(__DIR__ . "/input.txt");

if ($input === false) {
    die("Error: Failed to read input.txt. Check if the file exists and has read permissions.\n");
}

// Print the raw input data for debugging
echo "Input Data:\n" . $input . "\n";

// Regular expression to match valid 'mul(X,Y)' patterns
$pattern = '/mul\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)/';

// Initialize sum
$sum = 0;

// Perform regex match to extract all valid 'mul' instructions
if (preg_match_all($pattern, $input, $matches)) {
    // Loop through each match
    for ($i = 0; $i < count($matches[0]); $i++) {
        // Extract numbers
        $x = (int)$matches[1][$i];
        $y = (int)$matches[2][$i];

        // Multiply and add to the sum
        $sum += $x * $y;
    }
}

// Output the result
echo "Sum of all valid multiplications: $sum\n";


?>
