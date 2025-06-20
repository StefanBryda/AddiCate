<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styleSheets/mainStyle.css" type="text/css" rel="stylesheet">
    <link href="./styleSheets/exp-storypage.css" type="text/css" rel="stylesheet">
    <title>Stories</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <main class="subpage-main">
        <h1 class="subpage-title">Stories</h1>

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
                        <p>This is a personal reflection on growing up around addiction and struggling with self-worth, food, and substance use from a young age. It’s about how real change only became possible when safety and stability were finally part of the picture. &rarr;</p>        
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