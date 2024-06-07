<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>CoMon 101</title>
  <link rel="icon" type="image/x-icon" href="ASSETS/cat.png" />
  <link href="CSS/style.css" rel="stylesheet" />
</head>
<body>
  <nav class="navbar navFlex">
    <ul class="navbar-nav">
      <?php
        if(isset($_SESSION['name'])) { $name = $_SESSION['name'];
      ?>
      <li class="nav-item"><a class="nav-link" href="PHP/logout.php">LOGOUT</a></li>
      <?php
      } else {
      ?>
      <li class="nav-item"><a class="nav-link" href="PHP/login.php">LOGIN</a></li>
      <?php
      }
      ?>    
      <li class="nav-item"><a class="nav-link" href="PHP/socket.php">CHATTING</a></li>
      <li class="nav-item"><a class="nav-link" href="#">HOME</a></li>                    
      <li class="nav-item"><a class="nav-link" href="">PROFILE</a></li>
      <li class="nav-item"><a class="nav-link" href="#portfolio">PORTFOLIO</a></li>
    </ul>
  </nav>
  <div class="flex-container">
    <div class="border">
      <h1>ABOUT ME</h1>
      <hr class="vertical-hr">
    </div>
  </div>
  <div class="flex-box" id="portfolio">
    <h1>PORTFOLIO</h1>
    <div class="flex-portfolio">
    <div class="portfolio-item">
        <h2>CoMon</h2>
        <img src="ASSETS/img/comon.png" alt="Portfolio 1">
        <p>전공 동아리 'Common'의 대표 웹사이트</p>
        <a href="https://common.or.kr/">https://common.or.kr</a>
        <p>2024.04.17</p>
      </div>
      <div class="portfolio-item">
        <h2>IVE Guide</h2>
        <img src="ASSETS/img/ive.png" alt="Portfolio 2">
        <p>걸그룹 '아이브'에 대해 설명하는 웹사이트</p>
        <a href="https://daelimcs.netlify.app">https://daelimcs.netlify.app</a>
        <p>2024.05.28</p>
      </div>
      <div class="portfolio-item">
        <h2>Project 3</h2>
        <img src="ASSETS/img/react.png" alt="Portfolio 3">
        <p>Project 3 Description</p>
      </div>
      <div class="portfolio-item">
        <h2>Project 4</h2>
        <img src="ASSETS/img/react.png" alt="Portfolio 4">
        <p>Project 4 Description</p>
      </div>
      <div class="portfolio-item">
        <h2>Project 5</h2>
        <img src="ASSETS/img/react.png" alt="Portfolio 5">
        <p>Project 5 Description</p>
      </div>
      <div class="portfolio-item">
        <h2>Project 6</h2>
        <img src="ASSETS/img/react.png" alt="Portfolio 6">
        <p>Project 6 Description</p>
      </div>
      <div class="portfolio-item">
        <h2>Project 7</h2>
        <img src="ASSETS/img/react.png" alt="Portfolio 7">
        <p>Project 7 Description</p>
      </div>
      <div class="portfolio-item">
        <h2>Project 8</h2>
        <img src="ASSETS/img/react.png" alt="Portfolio 8">
        <p>Project 8 Description</p>
      </div>
      <div class="portfolio-item">
        <h2>Project 9</h2>
        <img src="ASSETS/img/react.png" alt="Portfolio 9">
        <p>Project 9 Description</p>
      </div>
    </div>
  </div>
  <div class="contact-form">
    <h1>CONTACT</h1>
      <form action="#" method="post">
        <div>
          <input type="text" id="name" name="name" placeholder="Your Name" required>
        </div>
        <div>
          <input type="email" id="email" name="email" placeholder="Your Email" required>
        </div>
        <div>
          <textarea id="message" name="message" placeholder="Your Message" required></textarea>
        </div>
        <button type="submit">Send</button>
      </form>
  </div>
  <footer>
    <p>&copy; 2024 CoMon KHS. All Rights Reserved.</p>
  </footer>

<script>
  window.addEventListener('scroll', function() {
    var scrollPosition = window.scrollY;
    var targetElement = document.querySelector('.flex-container');

    // 스크롤 위치에 따라 효과 적용
    if (scrollPosition > 100) {
      targetElement.classList.add('blur-shrink');
    } else {
      targetElement.classList.remove('blur-shrink');
    }
  });
</script>
</body>
</html>