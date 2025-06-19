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
            <a href="story-1.php" class="card-link">

                <div class="card" data-story-id="story1"> <img src="./images/addiction.png" alt="Story 1">
                    <div class="card-info">
                        <h2>Interview 1: A mans story to recovery</h2>
                        <p>*Add info on twan sharing his story </p>
                    </div>

                    <div class="story-expanded-content" id="story1-content">
                        <h3>Full Interview: A Man's Journey to Recovery</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, distinctio? Necessitatibus illum
                            asperiores quo minus dolorem, officiis reiciendis nulla. Vero, quam vitae? Exercitationem nulla
                            reprehenderit perspiciatis facilis. Vero, ducimus! Earum.</p>
                        
                    </div>
                </div>
            </a>

            <a href="story-2.php" class="card-link">

                <div class="card" data-story-id="story2"> <img src="./images/puzzle.jpeg" alt="Story 2">
                    <div class="card-info">
                        <h2>Interview 2: </h2>
                        <p>Understanding the emotional side of addiction and rebuilding trust.</p>
                    </div>

                    <div class="story-expanded-content" id="story2-content">
                        <h3>Full Interview: Rebuilding Trust</h3>
                        <p>This section would contain the detailed content for Interview 2. It could be a longer article,
                            more paragraphs, or even embedded media related to the story. The goal is to provide rich
                            information when the card is clicked.</p>        
                    </div>

                </div>
            </a>

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