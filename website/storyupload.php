<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_story'])) {
    $name = trim($_POST['name']);
    $story = trim($_POST['story']);
    
    // Basic validation
    if (!empty($name) && !empty($story)) {
        // Create stories directory if it doesn't exist
        if (!is_dir('stories')) {
            mkdir('stories', 0755, true);
        }
        
        // Create a unique filename with timestamp
        $timestamp = date('Y-m-d_H-i-s');
        $filename = "stories/story_" . $timestamp . ".txt";
        
        // Prepare story content
        $storyContent = "Name: " . $name . "\n";
        $storyContent .= "Date: " . date('F j, Y') . "\n";
        $storyContent .= "Time: " . date('H:i:s') . "\n";
        $storyContent .= "Story:\n" . $story . "\n";
        $storyContent .= "---\n";
        
        // Write story to file
        if (file_put_contents($filename, $storyContent) !== false) {
            $success_message = "Your story has been submitted successfully!";
        } else {
            $error_message = "Error saving story. Please try again.";
        }
    } else {
        $error_message = "Please fill in both name and story fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styleSheets/mainStyle.css" type="text/css" rel="stylesheet">
    <link href="./styleSheets/exp-storypage.css" type="text/css" rel="stylesheet">
    <title>Share Your Story</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="subpage-main">
        <h1 class="subpage-title">Share Your Story</h1>
        <!-- Story Submission Form -->
        <div class="story-form-container">
            <h2 class="section-title">Share Your Story</h2>
            <?php if (isset($success_message)): ?>
                <div class="message success"><?php echo htmlspecialchars($success_message); ?></div>
            <?php endif; ?>
            <?php if (isset($error_message)): ?>
                <div class="message error"><?php echo htmlspecialchars($error_message); ?></div>
            <?php endif; ?>
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