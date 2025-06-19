<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
    <link rel="stylesheet" href="./styleSheets/mainStyle.css" type="text/css">
    <link rel="stylesheet" href="./styleSheets/exp-videopage.css" type="text/css">
</head>

<body>

    <?php include 'header.php'; ?>

    <main class="subpage-main">
        <h1 class="subpage-title">Understanding Addiction</h1>

        <section class="video-grid">
            <div class="video-container">
                <video controls>
                    <source src="./videos/What is Addiction.mov" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

            <div class="video-info">
                <h2>What is Addiction</h2>
                <p>
                    This video walks you through the journey of someone living with addiction.
                    From daily struggles to moments of recovery, it provides emotional insight
                    and educational value. Watch carefully and reflect on how support can change lives.
                </p>
            </div>
        </section>

        <section class="video-grid">

            <div class="video-info">
                <h2>Stages of Addiction</h2>
                <p>
                    This video walks you through the stages of Addiction.
                </p>
            </div>

            <div class="video-container">
                <video controls>
                    <source src="./videos/Stages of Addiction.mov" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>

        </section>
    </main>


    <?php include 'footer.php'; ?>

</body>

</html>