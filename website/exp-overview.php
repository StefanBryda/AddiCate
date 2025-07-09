<?php
// Read submitted stories
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
    <link href="./styleSheets/mainStyle.css" type="text/css" rel="stylesheet">
    <link href="./styleSheets/exp-storypage.css" type="text/css" rel="stylesheet">
    <title>Community Stories Overview</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="subpage-main">
        <h1 class="subpage-title">Community Stories</h1>
        <div class="submitted-stories">
            <?php if (empty($submitted_stories)): ?>
                <p style="text-align: center; color: #666; font-style: italic;">No stories have been shared yet. Be the first to share your story!</p>
            <?php else: ?>
                <?php foreach ($submitted_stories as $story): ?>
                    <div class="story-item">
                        <div class="story-header">
                            <span class="story-author"><?php echo htmlspecialchars($story['name']); ?></span>
                            <span class="story-date"><?php echo htmlspecialchars($story['date']); ?></span>
                        </div>
                        <div class="story-content">
                            <?php echo nl2br(htmlspecialchars($story['story'])); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html> 