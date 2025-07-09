<?php
require_once("inc/dbconnect_inc.php");

$feedback = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? "Anonymous";
    $message = trim($_POST["message"]);

    if (!empty($message)) {
        try {
            $stmt = $dbHandler->prepare("INSERT INTO guestbook (name, message) VALUES (:name, :message)");
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":message", $message);
            $stmt->execute();
            $feedback = "Message added successfully!";
        } catch (Exception $ex) {
            $feedback = "Error adding message: " . htmlspecialchars($ex->getMessage());
        }
    } else {
        $feedback = "Message cannot be empty.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a Guestbook Message</title>
    <link rel="stylesheet" href="styleSheets/add_message.css">
    <link rel="stylesheet" href="styleSheets/mainStyle.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
            <h1>Add a Message</h1>

            <?php if (!empty($feedback)): ?>
                <div class="feedback"><?= $feedback ?></div>
            <?php endif; ?>

            <form method="post" action="" class="guestbook-form">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Anonymous allowed">

                <label for="message">Message:</label>
                <textarea name="message" id="message" rows="5" required></textarea>

                <input type="submit" value="Submit">
            </form>

            <a href="guestbook.php">← Back to Guestbook</a>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
