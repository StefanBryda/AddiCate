<?php
// Include database connection
include 'inc/dbconnect_inc.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_story'])) {
    $name = trim($_POST['name']);
    $story = trim($_POST['story']);
    
    // Basic validation
    if (!empty($name) && !empty($story)) {
        try {
            $stmt = $dbHandler->prepare("INSERT INTO stories (name, story) VALUES (?, ?)");
            $stmt->execute([$name, $story]);
            $success_message = "Your story has been submitted successfully!";
        } catch (Exception $ex) {
            $error_message = "Error submitting story: " . $ex->getMessage();
        }
    } else {
        $error_message = "Please fill in both name and story fields.";
    }
}

// Fetch submitted stories
try {
    $stmt = $dbHandler->query("SELECT * FROM stories ORDER BY timestamp DESC");
    $submitted_stories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    $submitted_stories = [];
    $error_message = "Error loading stories: " . $ex->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styleSheets/mainStyle.css" type="text/css" rel="stylesheet">
    <link href="./styleSheets/exp-storypage.css" type="text/css" rel="stylesheet">
    <title>Stories</title>
    <style>
        .story-form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .story-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .story-form label {
            font-weight: bold;
            color: #333;
        }
        
        .story-form input[type="text"],
        .story-form textarea {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            font-family: inherit;
        }
        
        .story-form textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        .story-form button {
            background: #007bff;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .story-form button:hover {
            background: #0056b3;
        }
        
        .message {
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }
        
        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .submitted-stories {
            max-width: 800px;
            margin: 2rem auto;
        }
        
        .story-item {
            background: white;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-left: 4px solid #007bff;
        }
        
        .story-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .story-author {
            font-weight: bold;
            color: #007bff;
            font-size: 1.1rem;
        }
        
        .story-date {
            color: #666;
            font-size: 0.9rem;
        }
        
        .story-content {
            line-height: 1.6;
            color: #333;
        }
        
        .section-title {
            text-align: center;
            margin: 2rem 0 1rem 0;
            color: #333;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>

    <?php include 'header.php'; ?>

    <main class="subpage-main">
        <h1 class="subpage-title">Stories</h1>

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

        <!-- Submitted Stories Section -->
        <div class="submitted-stories">
            <h2 class="section-title">Community Stories</h2>
            
            <?php if (empty($submitted_stories)): ?>
                <p style="text-align: center; color: #666; font-style: italic;">No stories have been shared yet. Be the first to share your story!</p>
            <?php else: ?>
                <?php foreach ($submitted_stories as $story): ?>
                    <div class="story-item">
                        <div class="story-header">
                            <span class="story-author"><?php echo htmlspecialchars($story['name']); ?></span>
                            <span class="story-date"><?php echo date('F j, Y', strtotime($story['timestamp'])); ?></span>
                        </div>
                        <div class="story-content">
                            <?php echo nl2br(htmlspecialchars($story['story'])); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <section class="card-grid">
            <div class="card" data-story-id="story1"> <img src="./images/addiction.png" alt="Story 1">
                <div class="card-info">
                    <h2>Interview 1: It Started Early</h2>
                </div>

                <a href="story-1.php" class="card-link">
                    <div class="story-expanded-content" id="story1-content">
                        <p>In this story, someone looks back on a long relationship with substances that began in early childhood. Recovery started when they began taking responsibility and building a healthier relationship with themselves and others. &rarr;</p>
                    </div>
                </a>
            </div>

            <div class="card" data-story-id="story2"> <img src="./images/puzzle.jpeg" alt="Story 2">
                <div class="card-info">
                    <h2>Interview 2: Finding Safety</h2>
                </div>

                <a href="story-2.php" class="card-link">

                    <div class="story-expanded-content" id="story2-content">
                        <p>This is a personal reflection on growing up around addiction and struggling with self-worth, food, and substance use from a young age. It's about how real change only became possible when safety and stability were finally part of the picture. &rarr;</p>        
                    </div>
                </a>    
            </div>

            <div class="card" data-story-id="coming-soon"> <img src="./images/coming soon.jpg" alt="Coming Soon">

                <div class="card-info">
                    <h2>More Stories Coming Soon</h2>
                    <p>We're working on more interviews to share powerful experiences.</p>
                </div>

                <div class="story-expanded-content" id="coming-soon-content">
                    <p>Stay tuned! More interviews to be!</p>
                </div>

            </div>
        </section>
    </main>


    <?php include 'footer.php'; ?>

    <script src="./js/storyToggle.js"></script>

</body>

</html>