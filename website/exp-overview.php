<?php
include 'inc/dbconnect_inc.php';
// Fetch submitted stories from the database
$submitted_stories = [];
try {
    $stmt = $dbHandler->query("SELECT Name, Story FROM Stories ORDER BY ID DESC");
    $submitted_stories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    $error_message = "Error loading stories: " . $ex->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styleSheets/mainStyle.css" type="text/css" rel="stylesheet">
    <link href="./styleSheets/exp-overview.css" type="text/css" rel="stylesheet">
    <title>Community Stories Overview</title>
    
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="exp-search-bar-row">
        <form class="story-search-bar" onsubmit="return false;" style="margin:0;">
            <input type="text" id="storySearchInput" placeholder="Search by name..." aria-label="Search stories by name">
            <button type="button" onclick="filterStories()">Search</button>
        </form>
    </div>
    <div class="exp-back-row">
        <a href="exp-story.php" class="back-arrow" aria-label="Back to Story Menu">&#8592; Back</a>
    </div>
    <main class="subpage-main">
        <h1 class="section-title">Stories</h1>
        <div class="submitted-stories">
            <?php if (isset($error_message)): ?>
                <div class="message error"><?php echo htmlspecialchars($error_message); ?></div>
            <?php endif; ?>
            <?php if (empty($submitted_stories)): ?>
                <p style="text-align: center; color: #666; font-style: italic;">No stories have been shared yet. Be the first to share your story!</p>
            <?php else: ?>
                <?php foreach ($submitted_stories as $story): ?>
                    <div class="story-item">
                        <div class="story-header">
                            <span class="story-author"><?php echo htmlspecialchars($story['Name']); ?></span>
                        </div>
                        <div class="story-content">
                            <?php echo nl2br(htmlspecialchars($story['Story'])); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
    <script>
    function filterStories() {
        const input = document.getElementById('storySearchInput').value.toLowerCase();
        const stories = document.querySelectorAll('.story-item');
        if (input === '') {
            stories.forEach(story => story.style.display = '');
        } else {
            stories.forEach(story => {
                const author = story.querySelector('.story-author').textContent.toLowerCase();
                if (author.includes(input)) {
                    story.style.display = '';
                } else {
                    story.style.display = 'none';
                }
            });
        }
    }
    // No input event listener, only button click triggers search
    </script>
</body>
</html> 