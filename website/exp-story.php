<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styleSheets/mainStyle.css" type="text/css" rel="stylesheet">
    <title>Stories</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <main class="subpage-main">
        <h1 class="subpage-title">Stories</h1>

        <section class="card-grid">
            <a href="story-1.php" class="card-link">
                <!-- Story 1 -->
                <div class="card">
                    <img src="./images/addiction.png" alt="Story 1">
                    <div class="card-info">
                        <h2>Interview 1: A mans story to recovery</h2>
                        <p>*Add info on twan sharing his story </p>
                    </div>
                </div>
            </a>

            <a href="story-2.php" class="card-link">
                <div class="card">
                    <img src="./images/puzzle.jpeg" alt="Story 2">
                    <div class="card-info">
                        <h2>Interview 2: </h2>
                        <p>Understanding the emotional side of addiction and rebuilding trust.</p>
                    </div>
                </div>
            </a>

            <!-- Coming Soon -->
            <div class="card">
                <img src="./images/coming soon.jpg" alt="Coming Soon">
                <div class="card-info">
                    <h2>More Stories Coming Soon</h2>
                    <p>We’re working on more interviews to share powerful experiences.</p>
                </div>
            </div>
        </section>
    </main>


    <?php include 'footer.php'; ?>

</body>

</html>