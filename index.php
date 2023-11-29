<?php

function transformString($inputString, $option) {
    switch ($option) {
        case 1:
            return strtoupper($inputString); // Transform string into uppercase
        case 2:
            return strtolower($inputString); // Transform string into lowercase
        case 3:
            return ucfirst($inputString);    // Transform first character into uppercase
        case 4:
            return lcfirst($inputString);    // Transform first character into lowercase
        default:
            return "Invalid option";
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve user input from the form
    $inputString = isset($_POST['inputString']) ? $_POST['inputString'] : '';
    $option = isset($_POST['option']) ? (int)$_POST['option'] : 0;

    // Validate the option
    if ($option < 1 || $option > 4) {
        $result = "Invalid option. Please choose a number between 1 and 4.";
    } else {
        // Perform the transformation
        $transformedString = transformString($inputString, $option);
        $result = "Original String: $inputString <br> Transformed String: $transformedString";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Transformation</title>
</head>
<body>

<form method="post" action="">
    <label for="inputString">Enter a string:</label>
    <input type="text" name="inputString" required>

    <p>Convert string-
        1. uppercase
        2. lowercase 
        3. first character uppercase
        4. first character lowercase </p>

    <label for="option">Select a transformation option (1-4):</label>
    <input type="number" name="option" min="1" max="4" required>

    <button type="submit">Transform</button>
</form>

<?php if (isset($result)) : ?>
    <p><?php echo $result; ?></p>
<?php endif; ?>

</body>
</html>
