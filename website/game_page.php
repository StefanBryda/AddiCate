<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Game Page</title>
    <link href="./styleSheets/mainStyle.css" rel="stylesheet" type="text/css" />
    <link href="./styleSheets/gamepage.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <?php include 'header.php'; ?>

    <div id="notification-message" class="hidden">
        
        <p id="notification-text"></p>
   
    </div>

    <div class="game-container">

        <div class="game-heading">
            <h1>Game</h1>
        </div>

        <div class="game-split-container">

            <!-- Game -->
            <div class="game-left-container">

                <div class="game-embed">

                    <iframe id="godot-game" src="../addicate/exports/web/demo3/AddicateGameDemo3.html" frameborder="0" allowfullscreen></iframe>
                
                </div>

            </div>

            <!-- Right Side -->
            <div class="game-right-container">

                <div class="game-description">

                    <h2>Game Story</h2>

                    <p>
                        Experience the life of Greg. Learn how easy it is to get addicted.
                        <br>⚠️ Content Warning: Game contains addiction-related content.
                        <br><i>This is a demo version 3.</i>
                    </p>

                </div>

                <div class="game-review">

                    <h2>Leave a Review</h2>

                    <form id="review-form" action="submit_review.php" method="post">

                        <textarea name="review" placeholder="Type your anonymous review here..." required></textarea>

                        <button type="submit">Submit Review</button>

                    </form>
                </div>

            </div>

        </div>

    </div>

    <?php include 'footer.php'; ?>

    <script src="./scripts/notification.js" defer></script>
    
</body>

</html>