<?php

// Start the timer
$startTime = microtime(true);

// Function to check if a report is safe
function isSafeReport($levels) {
    $n = count($levels);
    $increasing = true;
    $decreasing = true;
    
    for ($i = 1; $i < $n; $i++) {
        $diff = $levels[$i] - $levels[$i - 1];

        // Check if the difference is within the allowed range (1 to 3)
        if (abs($diff) < 1 || abs($diff) > 3) {
            return false; // Invalid difference
        }

        // Check the sequence type
        if ($diff > 0) {
            $decreasing = false; // Not decreasing if there's an increase
        } elseif ($diff < 0) {
            $increasing = false; // Not increasing if there's a decrease
        }
    }

    // Return true if it's either strictly increasing or strictly decreasing
    return $increasing || $decreasing;
}

function countSafeReports($input) {
    $lines = explode("\n", trim($input)); // Split input into lines
    $safeCount = 0;

    foreach ($lines as $line) {
        $levels = array_map('intval', explode(' ', trim($line))); // Parse numbers
        if (isSafeReport($levels)) {
            $safeCount++; // Increment if safe
        }
    }

    return $safeCount;
}

// Read input from a file or string
$input = file_get_contents("input.txt"); // Replace with your input file path

// Compute the number of safe reports
$result = countSafeReports($input);

// Output the result
echo "Number of safe reports: $result\n";

// End the timer and calculate the elapsed time
$endTime = microtime(true);
$executionTime = $endTime - $startTime;

echo "Execution time: " . $executionTime . " seconds\n";

?>
