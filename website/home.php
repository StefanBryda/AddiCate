<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="./styleSheets/mainStyle.css" type="text/css">

</head>
<body>

  <?php include 'header.php'; ?>
  
  <div class="main-content">
    <div class="hero-section">
      <div class="hero-text">
        <span class="hero-title">AddiCate</span>
        <p class="hero-desc">AddiCate, be educated</p>
      </div>
      <div class="hero-img">
        <!-- Purple cone/spotlight SVG background -->
        <div class="avatar-spotlight">
          <svg width="180" height="220" viewBox="0 0 180 220">
            <ellipse cx="90" cy="200" rx="70" ry="18" fill="#b39ddb" />
            <polygon points="40,200 90,30 140,200" fill="#d1b3ff" opacity="0.7" />
          </svg>
          <img src="./images/avatar1.png" alt="Pixel Character" />
        </div>
      </div>
    </div>

    <div class="sections-grid">
      <div class="section-box section-desc">
        <span class="section-title">Small desc of addiction</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
      </div>
      <div class="section-img section-img-logo">
        <img src="./images/addiction.png" alt="Addiction" />
      </div>
      <div class="section-img section-img-avatar">
        <img src="./images/avatar1.png" alt="Avatar" />
      </div>
      <div class="section-box section-game">
        <span class="section-title">Game desc</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>
  
</body>
</html>