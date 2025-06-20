<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styleSheets/mainStyle.css" rel="stylesheet" type="text/css">
    <link href="./styleSheets/gamepage.css" rel="stylesheet" type="text/css">
    <title>Game Page</title>
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="game-container">

        <div class="game-heading">
            <h1>Game</h1>
        </div>


        <div class="game-split-container">

            <!-- Left Side - Game Embed -->
            <div class="game-left-container">

                <div class="game-embed">

                    <iframe id="godot-game" src="../addicate/exports/web/demo3/AddicateGameDemo3.html" frameborder="0" allowfullscreen></iframe>

                </div>

            </div>

            <!-- Right Side - Description and Review -->
            <div class="game-right-container">

                <div class="game-description">

                    <h2>Game Story</h2>
                    <p>By participating in this game, you will be able to experience the life of Greg. You will see and learn, how easily a person can get addicted to anything.<br>
                    CONTENT WARNING: Game contains motives of addiction<br>
                    (This is a demo version 3)
                    </p>

                </div>

                <div class="game-review">

                    <h2>Leave a Review</h2>
                    <form id="review-form" action="mailto:projectaddicate25@gmail.com" method="post" enctype="text/plain">

                        <textarea name="review" placeholder="Type your anonymous review here..." required></textarea>

                        <button type="submit">Submit Review</button>

                    </form>

                </div>

            </div>

        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>