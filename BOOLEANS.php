<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOLEANS</title>
</head>
<body>
    
<?php

// Define two boolean variables
$isSunny = true;
$isRainy = false;

// Check weather conditions
if ($isSunny) {
    echo "It's a sunny day. Don't forget your sunglasses!<br>";
} else {
    echo "It's not sunny today. You might need an umbrella.<br>";
}

if ($isRainy) {
    echo "It's raining outside. Grab your raincoat!<br>";
} else {
    echo "No rain today. Enjoy the dry weather!<br>";
}

// Perform boolean operations
$andResult = $isSunny && $isRainy;
$orResult = $isSunny || $isRainy;
$notResult = !$isSunny;

// Output the results
echo "isSunny && isRainy: " . ($andResult ? "true" : "false") . "<br>";
echo "isSunny || isRainy: " . ($orResult ? "true" : "false") . "<br>";
echo "!isSunny: " . ($notResult ? "true" : "false") . "<br>";

?>




</body>
</html>