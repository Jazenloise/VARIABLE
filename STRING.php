<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STRING</title>
</head>
<body>

<?php

$string1 = "This is a string in double quotes";

echo "Original String: $string1<br>";

$length = strlen($string1);
echo "Length of the String: $length<br>";

$uppercaseString = strtoupper($string1);
echo "Uppercase String: $uppercaseString<br>";

$substring = 'string';
if (strpos($string1, $substring) !== false) {
    echo "Substring '$substring' This is a string in double quotes.<br>";
} else {
    echo "Substring '$substring' This is NOT a string in double quotes.<br>";
}

$replacementString = str_replace('PHP', 'JavaScript', $string1);
echo "Replaced String: $replacementString<br>";

?>

    
</body>
</html>