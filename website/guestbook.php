<!DOCTYPE html>
<html>
<head>
    <title>Guestbook Messages</title>
    <link rel="stylesheet" href="styleSheets/guestbook.css">
    <link rel="stylesheet" href="styleSheets/mainStyle.css">
</head>
<body>

    <?php include 'header.php'; ?>
    <main>
        <h1>Guestbook Messages</h1>

        <div class="button-bar">
            <a href="add_message.php" class="add-message-button">Add a Message</a>
        </div>


        <?php
        require_once("inc/dbconnect_inc.php");

        try {
            $stmt = $dbHandler->prepare("SELECT * FROM guestbook ORDER BY timestamp DESC");
            $stmt->execute();
            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($messages)) {
                echo "<p>No messages yet.</p>";
            } else {
                foreach ($messages as $message) {
                    $name = htmlspecialchars($message['name'] ?: 'Anonymous');
                    $text = nl2br(htmlspecialchars($message['message']));
                    $time = htmlspecialchars($message['timestamp']);
                    echo "<div class='message'>
                            <div class='message-header'>
                                <span class='name'>$name</span>
                                <span class='timestamp'>Posted on $time</span>
                            </div>
                            <div class='content'>$text</div>
                        </div>";
                }
            }

        } catch (Exception $ex) {
            echo "<p>Error fetching messages: " . htmlspecialchars($ex->getMessage()) . "</p>";
        }
        ?>

    </main>
    <?php include 'footer.php'; ?>


</body>
</html>
