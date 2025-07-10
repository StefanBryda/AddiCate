<?php
// Connect to the database
include 'inc/dbconnect_inc.php';

// Handle form submission when the user clicks 'Submit Story'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_story'])) {
    $name = trim($_POST['name']); // Get the name from the form
    $story = trim($_POST['story']); // Get the story from the form
    // Check if both fields are filled in
    if (!empty($name) && !empty($story)) {
        try {
            // Insert the story into the database
            $stmt = $dbHandler->prepare("INSERT INTO Stories (Name, Story) VALUES (?, ?)");
            $stmt->execute([$name, $story]);
            $success_message = "Your story has been submitted successfully!";
            unset($_POST['name'], $_POST['story']); // Clear the form fields
        } catch (Exception $ex) {
            // Show an error if something goes wrong
            $error_message = "Error saving story: " . $ex->getMessage();
        }
    } else {
        // Show an error if fields are empty
        $error_message = "Please fill in both name and story fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to main and page-specific CSS -->
    <link href="./styleSheets/mainStyle.css" type="text/css" rel="stylesheet">
    <link href="./styleSheets/storyupload.css" type="text/css" rel="stylesheet">
    <title>Share Your Story</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <!-- Back arrow to return to the previous page -->
    <a href="exp-story.php" class="back-arrow" aria-label="Back to Story Menu">&#8592; Back</a>
    <main class="subpage-main">
        <!-- Page title -->
        <h1 class="subpage-title">Share Your Story</h1>
        <!-- Story Submission Form -->
        <div class="story-form-container">
            <!-- Show success or error messages -->
            <?php if (isset($success_message)): ?>
                <div class="message success"><?php echo htmlspecialchars($success_message); ?></div>
            <?php endif; ?>
            <?php if (isset($error_message)): ?>
                <div class="message error"><?php echo htmlspecialchars($error_message); ?></div>
            <?php endif; ?>
            <!-- The form where users enter their name and story -->
            <form class="story-form" method="POST">
                <div>
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required maxlength="100" 
                           value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                </div>
                <div>
                    <label for="story">Your Story:</label>
                    <textarea id="story" name="story" required placeholder="Share your experience, thoughts, or journey..."><?php echo isset($_POST['story']) ? htmlspecialchars($_POST['story']) : ''; ?></textarea>
                </div>
                <button type="submit" name="submit_story">Submit Story</button>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html> 