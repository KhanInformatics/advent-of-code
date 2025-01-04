<?php


echo "Current Working Directory: " . getcwd() . "\n";

// Read input from a file or string
$input = file_get_contents(__DIR__ . "/input.txt");

if ($input === false) {
    die("Error: Failed to read input.txt. Check if the file exists and has read permissions.\n");
}

echo $input;

$str = $input;

$pattern = "/ain/i";
if(preg_match_all($pattern, $str, $matches)) {
  print_r($matches);
}
?>