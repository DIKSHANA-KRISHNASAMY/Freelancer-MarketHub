<?php include('server.php');
if(isset($_SESSION["Username"])){
    $username=$_SESSION["Username"];
    if ($_SESSION["Usertype"]==1) {
        header("location: freelancerProfile.php");
    }
    else{
        header("location: employerProfile.php");
    }
}
else{
    $username="";
    //header("location: index.php");
}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
      <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap ">
    <link rel="stylesheet" href="styles.css" />
    <title>Hypersphere for Students</title>

    <style>
      .nav__links .btn {
        min-width: 120px; /* Adjust as needed */
        padding: 10px 20px;
        white-space: nowrap;
      }
              /* Footer Styles */
  .footer {
    background-color: #fff;
    padding: 4rem 0 2rem;
    border-top: 1px solid rgba(106, 56, 194, 0.1);
    position: relative;
  }

  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
  }

  .footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
  }

  .footer-column {
    margin-bottom: 1.5rem;
  }

  .footer-heading {
    font-family: 'League Spartan', sans-serif;
    font-size: 1.1rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 0.5rem;
  }

  .footer-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 2px;
    background: linear-gradient(90deg, #6a38c2, #fa6021);
  }

  .footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .footer-links li {
    margin-bottom: 0.8rem;
  }

  .footer-links a {
    color: #666;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.95rem;
  }

  .footer-links a:hover {
    color: #6a38c2;
    transform: translateX(5px);
  }

  .footer-links i {
    font-size: 1.1rem;
    color: #6a38c2;
  }

  .social-links {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
  }

  .social-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: #f5f2ff;
    color: #6a38c2;
    font-size: 1.2rem;
    transition: all 0.3s ease;
  }

  .social-icon:hover {
    background-color: #6a38c2;
    color: white;
    transform: translateY(-3px);
  }

  .newsletter h4 {
    font-size: 0.95rem;
    color: #666;
    margin-bottom: 1rem;
    font-weight: 500;
  }

  .newsletter-form {
    display: flex;
    border: 1px solid #ddd;
    border-radius: 30px;
    overflow: hidden;
  }

  .newsletter-form input {
    flex: 1;
    padding: 0.75rem 1rem;
    border: none;
    outline: none;
    font-size: 0.9rem;
  }

  .newsletter-form button {
    background-color: #6a38c2;
    color: white;
    border: none;
    padding: 0 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .newsletter-form button:hover {
    background-color: #5a2db0;
  }

  .footer-bottom {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding-top: 2rem;
    margin-top: 2rem;
    border-top: 1px solid rgba(106, 56, 194, 0.1);
  }

  .footer-logo {
    margin-bottom: 1rem;
  }

  .copyright {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 1rem;
  }

  .footer-legal {
    display: flex;
    gap: 1.5rem;
  }

  .footer-legal a {
    color: #666;
    font-size: 0.85rem;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .footer-legal a:hover {
    color: #6a38c2;
  }

  @media (min-width: 768px) {
    .footer-grid {
      grid-template-columns: repeat(4, 1fr);
    }
    
    .footer-bottom {
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
      text-align: left;
    }
    
    .footer-logo {
      margin-bottom: 0;
    }
    
    .copyright {
      margin-bottom: 0;
    }
  }
  .newsletter-input-container {
    position: relative;
    max-width: 300px;
  }

  .newsletter-input {
    width: 100%;
    padding: 0.75rem 3rem 0.75rem 1rem;
    border: 1px solid #ddd;
    border-radius: 30px;
    outline: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    background: white;
  }

  .newsletter-input:focus {
    border-color: #6a38c2;
    box-shadow: 0 0 0 2px rgba(106, 56, 194, 0.2);
  }

  .newsletter-button {
    position: absolute;
    right: 6px;
    top: 50%;
    transform: translateY(-50%);
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: #6a38c2;
    color: white;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .newsletter-button:hover {
    background-color: #5a2db0;
    transform: translateY(-50%) scale(1.05);
  }

  .newsletter-button i {
    font-size: 1.1rem;
  }
    </style>
  </head>

  <body>
    <nav>
      <div class="nav__header">
        <div class="nav__logo">
          <a href="#" class="logo"><span style="font-size: 25px; font-weight: 700; color: #6A38C2;">
            .hypersphere.
          </span></a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#journey">Journey</a></li>
        <li><a href="#explore">Explore</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#service">Services</a></li>

        <li><button class="btn" onclick="window.location.href='loginReg.php'" style="font-family: 'League Spartan', sans-serif;">Become a Freelancer</button></li>
      </ul>
    </nav>
    <header class="section__container header__container" id="home">
      <img src="image/google.png " style="position: relative; right: 5px;" alt="header" />
      <img src="image/twitter.png" alt="header" />
      <img src="image/amazon.png" alt="header" />
      <img src="./image/figma.png" alt="header" />
      <img src="image/linkedin.png" alt="header" />
      <img src="image/microsoft.png" alt="header" />
<h2>
    <img src="image/bag.png" alt="bag" />
    No.1 Freelancing Platform for Students
</h2>
<h1>Connect, Collaborate &<br />Showcase Your <span>Skills</span></h1>
<p>
    Your journey to success starts here. Discover freelance opportunities, collaborate with fellow students, and work on exciting projects that boost your career.
</p>
<div class="header__btns">
  <button class="btn" onclick="window.location.href='leaderboard.html'">Leaderboard</button>
  <a href="https://youtu.be/ggHACGb0mtU?si=M-C4jYnhO-h6YiWe" target="_blank">
      <span><i class="ri-play-fill"></i></span> How It Works?
  </a>
</div>



      </div>
    </header>

<section class="steps" id="about">
  <div class="section__container steps__container" id="journey">
    <h2 class="section__header">
      Start Your Freelancing Journey in <br>4 <span>Easy Steps</span>
    </h2>
    <p class="section__description">
      Follow this simple guide to kickstart your freelancing career, connect with clients, and build your portfolio.
    </p>
    <div class="steps__grid">
      <div class="steps__card">
        <span><i class="ri-user-fill"></i></span>
        <h4>Create Your Profile</h4>
        <p>
          Sign up with your college email to unlock access to student-specific job opportunities. Build a professional profile that showcases your skills, qualifications, and what you can offer to clients.
        </p>
      </div>
      <div class="steps__card">
        <span><i class="ri-search-fill"></i></span>
        <h4>Explore Freelance Projects</h4>
        <p>
          Browse through various projects and job opportunities posted by clients looking for students like you. Choose projects that match your skills and interests, and start applying!
        </p>
      </div>
      <div class="steps__card">
        <span><i class="ri-file-paper-fill"></i></span>
        <h4>Build Your Portfolio</h4>
        <p>
          As you work on projects, showcase your completed work in your portfolio. This will help you attract more clients and build your freelancing career while studying.
        </p>
      </div>
      <div class="steps__card">
        <span><i class="ri-briefcase-fill"></i></span>
        <h4>Get Paid and Grow</h4>
        <p>
          Once you've completed your project, get paid and build your reputation as a freelancer. Keep growing your network, taking on new challenges, and achieving success while managing your studies.
        </p>
      </div>
    </div>
  </div>
</section>


<section class="section__container explore__container" id="explore">
  <h2 class="section__header">
    <span>Endless Freelance Projects</span> Are Waiting For You to Apply
  </h2>
  <p class="section__description">
    Explore a variety of freelance opportunities across multiple fields and industries. Find the perfect project to kickstart your career!
  </p>
  <div class="explore__grid">
    <div class="explore__card" onclick="window.location.href='design-projects.html'">
      <span><i class="ri-pencil-ruler-2-fill"></i></span>
      <h4>Design</h4>
      <p>200+ freelance projects</p>
    </div>
    
    <div class="explore__card" onclick="window.location.href='design-projects.html'">
      <span><i class="ri-bar-chart-box-fill"></i></span>
      <h4>Sales</h4>
      <p>350+ freelance projects</p>
    </div>
    <div class="explore__card" onclick="window.location.href='design-projects.html'">
      <span><i class="ri-megaphone-fill"></i></span>
      <h4>Marketing</h4>
      <p>500+ freelance projects</p>
    </div>
    <div class="explore__card" onclick="window.location.href='design-projects.html'">
      <span><i class="ri-wallet-3-fill"></i></span>
      <h4>Finance</h4>
      <p>200+ freelance projects</p>
    </div>
    <div class="explore__card" onclick="window.location.href='design-projects.html'">
      <span><i class="ri-car-fill"></i></span>
      <h4>Automobile</h4>
      <p>250+ freelance projects</p>
    </div>
    <div class="explore__card" onclick="window.location.href='design-projects.html'">
      <span><i class="ri-truck-fill"></i></span>
      <h4>Logistics / Delivery</h4>
      <p>1k+ freelance projects</p>
    </div>
    <div class="explore__card" onclick="window.location.href='design-projects.html'">
      <span><i class="ri-computer-fill"></i></span>
      <h4>Admin</h4>
      <p>100+ freelance projects</p>
    </div>
    <div class="explore__card" onclick="window.location.href='design-projects.html'">
      <span><i class="ri-building-fill"></i></span>
      <h4>Construction</h4>
      <p>500+ freelance projects</p>
    </div>
  </div>
  <div class="explore__btn">
    <!-- <button class="btn" onclick="window.location.href='category.html'" style="font-family: 'League Spartan', sans-serif;">
      View All Freelance Categories
  </button> -->
    </div>
</section>


    <section class="section__container job__container" id="projects">
      <h2 class="section__header"><span>Latest & Top</span> Freelance Projects</h2>
      <p class="section__description">
        Explore high-demand freelance opportunities across various industries and fields.
      </p>
    
      <div class="job__grid">
        <div class="job__card">
          <div class="job__card__header">
            <img src="./image/figma.png" alt="freelance" />
            <div>
              <h5>Figma</h5>
              <h6>Remote</h6>
            </div>
          </div>
          <h4>UI/UX Designer</h4>
          <p>
            Design innovative user interfaces and experiences for various digital products on a freelance basis.
          </p>
          <div class="job__card__footer">
            <span>5 Projects</span>
            <span>Freelance</span>
            <span>$50/hr</span>
          </div>
        </div>
        <div class="job__card">
          <div class="job__card__header">
            <img src="image/google.png" alt="freelance" />
            <div>
              <h5>Google</h5>
              <h6>Remote</h6>
            </div>
          </div>
          <h4>Project Manager</h4>
          <p>
            Manage freelance projects, timelines, and budgets, ensuring clear communication and timely delivery.
          </p>
          <div class="job__card__footer">
            <span>2 Projects</span>
            <span>Freelance</span>
            <span>$70/hr</span>
          </div>
        </div>
        <div class="job__card">
          <div class="job__card__header">
            <img src="./image/linkedin.png" alt="freelance" />
            <div>
              <h5>LinkedIn</h5>
              <h6>Remote</h6>
            </div>
          </div>
          <h4>Full Stack Developer</h4>
          <p>
            Work on both front-end and back-end web development for various clients in a freelance capacity.
          </p>
          <div class="job__card__footer">
            <span>10 Projects</span>
            <span>Freelance</span>
            <span>$45/hr</span>
          </div>
        </div>
        <div class="job__card">
          <div class="job__card__header">
            <img src="image/amazon.png" alt="freelance" />
            <div>
              <h5>Amazon</h5>
              <h6>Remote</h6>
            </div>
          </div>
          <h4>Front-end Developer</h4>
          <p>
            Create and optimize user-facing web interfaces using HTML, CSS, and JavaScript for various projects.
          </p>
          <div class="job__card__footer">
            <span>8 Projects</span>
            <span>Freelance</span>
            <span>$40/hr</span>
          </div>
        </div>
        <div class="job__card">
          <div class="job__card__header">
            <img src="image/twitter.png" alt="freelance" />
            <div>
              <h5>Twitter</h5>
              <h6>Remote</h6>
            </div>
          </div>
          <h4>ReactJS Developer</h4>
          <p>
            Build dynamic and interactive web applications using ReactJS for various clients on a project basis.
          </p>
          <div class="job__card__footer">
            <span>6 Projects</span>
            <span>Freelance</span>
            <span>$55/hr</span>
          </div>
        </div>
        <div class="job__card">
          <div class="job__card__header">
            <img src="image/microsoft.png" alt="freelance" />
            <div>
              <h5>Microsoft</h5>
              <h6>Remote</h6>
            </div>
          </div>
          <h4>Python Developer</h4>
          <p>
            Build scalable back-end applications using Python for various freelance projects across industries.
          </p>
          <div class="job__card__footer">
            <span>4 Projects</span>
            <span>Freelance</span>
            <span>$60/hr</span>
          </div>
        </div>
      </div>
    </section>
    

    <section class="section__container offer__container" id="service">
      <h2 class="section__header">What We <span>Offer</span></h2>
      <p class="section__description">
        Explore the Benefits and Services We Provide to Enhance <br>Your Freelance Journey
      </p>
      <div class="offer__grid">
        <div class="offer__card">
          <img src="image/offer-1.jpg" alt="offer" />
          <div class="offer__details">
            <span>01</span>
            <div>
              <h4>Freelance Project Recommendations</h4>
              <p>
                Get personalized freelance project suggestions based on your skills and experience.
              </p>
            </div>
          </div>
        </div>
        <div class="offer__card">
          <img src="image/offer-2.jpg" alt="offer" />
          <div class="offer__details">
            <span>02</span>
            <div>
              <h4>Better Earnings</h4>
              <p>Earn more than traditional freelancing platforms, tailored to students' needs.
              </p>
            </div>
          </div>
        </div>
        <div class="offer__card">
          <img src="image/offer-3.jpg" alt="offer" />
          <div class="offer__details">
            <span>03</span>
            <div>
              <h4>Zero Competition from Experienced Freelancers</h4>
              <p>Work in a student-only environment where you can earn better, knowing we understand your hardships and your need for fair opportunities.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    


    <footer class="footer">
  <div class="container">
    <div class="footer-grid">
      <!-- Quick Links Column -->
      <div class="footer-column">
        <h3 class="footer-heading">Quick Links</h3>
        <ul class="footer-links">
          <li><a href="index.php"><i class="ri-home-4-line"></i> Home</a></li>
          <li><a href="allJob.php"><i class="ri-briefcase-line"></i> Browse Jobs</a></li>
          <li><a href="allFreelancer.php"><i class="ri-user-search-line"></i> Freelancers</a></li>
          <li><a href="allEmployer.php"><i class="ri-building-line"></i> Employers</a></li>
        </ul>
      </div>
      
      <!-- About Us Column -->
      <div class="footer-column">
        <h3 class="footer-heading">About Us</h3>
        <ul class="footer-links">
          <li><a href="#"><i class="ri-team-line"></i> Our Team</a></li>
          <li><a href="#"><i class="ri-information-line"></i> About Hypersphere</a></li>
          <li><a href="#"><i class="ri-git-repository-line"></i> GitHub</a></li>
          <li><a href="#"><i class="ri-history-line"></i> Version History</a></li>
        </ul>
      </div>
      
      <!-- Contact Us Column -->
      <div class="footer-column">
        <h3 class="footer-heading">Contact Us</h3>
        <ul class="footer-links">
          <li><a href="#"><i class="ri-map-pin-line"></i> BIT, Sathyamangalam</a></li>
          <li><a href="#"><i class="ri-mail-line"></i> teamhypersphere@gmail.com</a></li>
          <li><a href="#"><i class="ri-phone-line"></i> +91 8072445055</a></li>
          <li><a href="#"><i class="ri-customer-service-line"></i> Support Center</a></li>
        </ul>
      </div>
      
      <!-- Social Media Column -->
      <div class="footer-column">
        <h3 class="footer-heading">Connect With Us</h3>
        <div class="social-links">
          <a href="#" class="social-icon"><i class="ri-twitter-x-fill"></i></a>
          <a href="#" class="social-icon"><i class="ri-linkedin-fill"></i></a>
          <a href="#" class="social-icon"><i class="ri-facebook-fill"></i></a>
          <a href="#" class="social-icon"><i class="ri-instagram-line"></i></a>
          <a href="#" class="social-icon"><i class="ri-github-fill"></i></a>
        </div>
        
        <div class="newsletter">
          <h4>Subscribe to our newsletter</h4>
          <div class="newsletter-input-container">
            <input type="email" placeholder="Your email address" class="newsletter-input">
            <button type="submit" class="newsletter-button">
              <i class="ri-send-plane-fill"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="footer-bottom">
      <div class="footer-logo">
        <span style="font-size: 1.5rem; font-weight: 700; color: #6a38c2">.hypersphere.</span>
      </div>
      <div class="copyright">
        &copy; <?php echo date("Y"); ?> Hypersphere. All rights reserved.
      </div>
      <div class="footer-legal">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
        <a href="#">Cookie Policy</a>
      </div>
    </div>
  </div>
</footer>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>
