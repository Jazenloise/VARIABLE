<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NULL</title>
</head>
<body>
    
<?php


$nullVar = NULL;


if (is_null($nullVar)) {
    echo "nullVar is NULL.<br>";
} else {
    echo "nullVar is not NULL.<br>";
}

$nullVar = "This is not NULL.";

if (is_null($nullVar)) {
    echo "nullVar is NULL.<br>";
} else {
    echo "nullVar is not NULL. Its value is: $nullVar<br>";
}

?>



</body>
</html>