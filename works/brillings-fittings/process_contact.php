<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Process</title>
</head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = htmlspecialchars(trim($_POST["firstName"]));
    $lastName = htmlspecialchars(trim($_POST["lastName"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $comments = htmlspecialchars(trim($_POST["comments"]));

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($comments)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Log for debugging
            file_put_contents('log.txt', json_encode($_POST));

            // Redirect to thank-you page
            header("Location: thank_you.php");
            exit();
        } else {
            echo "Invalid email address.";
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Method not allowed.";
}
?>

</body>
</html>