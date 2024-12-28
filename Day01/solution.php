<?php

// Read the input file
$input = file('input.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Parse the input into two arrays
$left = [];
$right = [];
//entire loop is to get the left and right values from the input file
foreach ($input as $line) {
    list($l, $r) = explode(' ', trim($line));
    $left[] = (int)$l;
    $right[] = (int)$r;
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
echo "Total Distance: $totalDistance\n";

?>