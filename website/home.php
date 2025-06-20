<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="./styleSheets/mainStyle.css" type="text/css">
  <link rel="stylesheet" href="./styleSheets/homepage.css" type="text/css">

</head>

<body>

  <?php include 'header.php'; ?>

  <main>

    <section class="hero-container">
      <div class="hero-section">
        <div class="hero-content">
          <h1>Welcome to Addicate</h1>
          <p>Learn about addiction and how it affects lives. Empower yourself through knowledge and stories.</p>
        </div>
        <img src="./images/avatar1.png" alt="Hero Avatar" class="hero-avatar" />
      </div>
    </section>


    <section class="section">
      <h2 class="section-title">What is Addiction?</h2>
      <section class="addiction-section">

        <div class="addiction-anim-left">

          <img src="./images/chain-break.png" alt="Breaking chains" />
        </div>

        <div class="addiction-box" data-aos="flip-up">
          <p>Recovery Starts with Understanding</p>
          <p> Addiction happens when you feel you can’t stop doing or using something, even when it’s causing real problems in your life. It might be alcohol, drugs or smoking, but it can also be gambling, shopping, gaming, working too much or endless scrolling on your phone.</p>
          <p>Over time, your brain starts craving that “rush” so strongly that saying “no” feels almost impossible, and you end up feeling stuck, alone or ashamed.</p>
          <p>But addiction is not a moral failing, it’s a health issue that affects how your brain and body work. You aren’t weak or “broken.”</p>
          <p>With understanding, kindness and the right support, whether that’s talking to friends or family, seeing a counsellor or doctor, joining a support group, or trying specific treatments, you can learn healthier ways to cope, rebuild trust in yourself, and take back control of your life. </p>
          <p> You don’t have to face it on your own.</p>
        </div>

        <div class="addiction-anim-right">

          <img src="./images/brain.png" alt="Brain cycle" />
        </div>
      </section>
    </section>

    <section class="section">

      <h2 class="section-title">Discover</h2>

      <div class="discover-section">

        <div class="discover-image">
          <img src="./images/people together.jpg" alt="Discover Illustration" />
        </div>

        <div class="info-box">
          <p>Discover stories and experiences from other people.</p>
          <p>Get to know their experience, recovery process, and challenges along the way.
            Learn from them and reflect on your own journey.</p

            <input type="button" onclick="location.href='experience.php'" class="discover-btn">
          <button class="discover-btn" onclick="location.href='experience.php'">Read More</button>
        </div>

      </div>

    </section>

    <section class="section">

      <h2 class="section-title">Our Game</h2>

      <div class="our-game">
        <div class="info-box">
          <p>We believe in show and tell</p>
          <p>Our game showcases the life of a person going through addiction, not just the struggles but also their recovery process.
            We have released a demo version of the game and if we get more support we would be able to demonstrate the story better.
          </p>
        </div>
        <div class="placeholder-image"></div>
      </div>
    </section>

  </main>

  <?php include 'footer.php'; ?>

</body>

</html>