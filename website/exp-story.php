<?php
// Handle form submission for new stories (if used)
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

// Read submitted stories from the 'stories' folder
$submitted_stories = [];
if (is_dir('stories')) {
    $dirOpen = opendir('stories');
    while ($curFile = readdir($dirOpen)) {
        if ($curFile != "." && $curFile != ".." && pathinfo($curFile, PATHINFO_EXTENSION) == 'txt') {
            $filepath = 'stories/' . $curFile;
            $content = file_get_contents($filepath);
            if ($content !== false) {
                $lines = explode("\n", $content);
                $storyData = [];
                $currentStory = "";
                $readingStory = false;
                // Parse each line to get story details
                foreach ($lines as $line) {
                    if (strpos($line, 'Name: ') === 0) {
                        $storyData['name'] = substr($line, 6);
                    } elseif (strpos($line, 'Date: ') === 0) {
                        $storyData['date'] = substr($line, 6);
                    } elseif (strpos($line, 'Time: ') === 0) {
                        $storyData['time'] = substr($line, 6);
                    } elseif ($line === 'Story:') {
                        $readingStory = true;
                    } elseif ($line === '---') {
                        $readingStory = false;
                        $storyData['story'] = trim($currentStory);
                        break;
                    } elseif ($readingStory) {
                        $currentStory .= $line . "\n";
                    }
                }
                // Only add stories with both name and content
                if (!empty($storyData['name']) && !empty($storyData['story'])) {
                    $submitted_stories[] = $storyData;
                }
            }
        }
    }
    closedir($dirOpen);
    // Sort stories by date (newest first)
    usort($submitted_stories, function($a, $b) {
        return strtotime($b['date'] . ' ' . $b['time']) - strtotime($a['date'] . ' ' . $a['time']);
    });
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to main and page-specific CSS -->
    <link href="./styleSheets/mainStyle.css" type="text/css" rel="stylesheet">
    <link href="./styleSheets/exp-storypage.css" type="text/css" rel="stylesheet">
    <title>Stories</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <!-- Main content: card grid for story actions -->
    <main class="subpage-main">
        <section class="card-grid">
            <!-- Card for sharing a new story -->
            <div class="card" data-story-id="story-upload">
                <a href="storyupload.php" class="card-link">
                    <img src="./images/share-your-story.png" alt="Share Your Story">
                    <div class="card-info">
                        <h2>Share Your Story</h2>
                    </div>
                    <div class="story-expanded-content" id="story-upload-content">
                        <p>Click here to share your experience and read stories from others!</p>
                    </div>
                </a>
            </div>
            <!-- Card for viewing shared stories -->
            <div class="card" data-story-id="shared-stories">
                <a href="exp-overview.php" class="card-link">
                    <img src="./images/puzzle.jpeg" alt="Shared Stories">
                    <div class="card-info">
                        <h2>Shared Stories</h2>
                    </div>
                    <div class="story-expanded-content" id="shared-stories-content">
                        <p>Read real experiences and journeys shared by multiple people. Click to explore stories of hope, challenge, and recovery from our community.</p>
                    </div>
                </a>
            </div>
            <!-- Card for upcoming features -->
            <div class="card" data-story-id="coming-soon">
                <a href="#" class="card-link" tabindex="-1" style="pointer-events: none;">
                    <img src="./images/coming soon.jpg" alt="Coming Soon">
                    <div class="card-info">
                        <h2>More Features Coming Soon</h2>
                    </div>
                    <div class="story-expanded-content" id="coming-soon-content">
                        <p>We're working on new features and improvements to make your experience even better. Stay tuned!</p>
                    </div>
                </a>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
    <!-- Script for card hover/expand (if needed) -->
    <script src="./js/storyToggle.js"></script>
</body>
</html>