
<!DOCTYPE html>
<!-- John Estes - October 22, 2026 -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Building a Dynamic Form with PHP</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>

    <h1>Building a Dynamic Form with PHP</h1>
    <p>John Estes</p>
    <p>October 22, 2026</p>

    <?php
    // Check whether the form was submitted using POST.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Retrieve and trim submitted form values.
        $name = trim($_POST["name"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $message = trim($_POST["message"] ?? "");

        // Sanitize the submitted email address.
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Validate the submitted fields.
        if (empty($name) || empty($email) || empty($message)) {
            $output = "Error: All fields are required.";
            $class = "error";
        } else {
            // Create a confirmation message for valid inputs.
            $output = "Your form has been submitted successfully!";
            $class = "success";
        }

        // Display the confirmation or error message.
        echo "<div class='$class'>";
        echo "<p>$output</p>";
        echo "</div>";

        // Display submitted values safely.
        if ($class == "success") {
            echo "<p>Name: " . htmlspecialchars($name) . "</p>";
            echo "<p>Email: " . htmlspecialchars($email) . "</p>";
            echo "<p>Message: " . nl2br(htmlspecialchars($message)) . "</p>";
        }
    }
    ?>

</body>
</html>
