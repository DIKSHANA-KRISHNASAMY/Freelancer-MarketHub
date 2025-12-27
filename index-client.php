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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    <link
      href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap "
    />
    <link rel="stylesheet" href="styles.css" />
    <title>Hypersphere for Businesses</title>

    <style>
      .nav__links .btn {
        min-width: 120px; /* Adjust as needed */
        padding: 10px 20px;
        white-space: nowrap;
      }
      /* Navbar Styling */
      .nav__links {
        display: flex;
        align-items: center;
        gap: 10px; /* Reduced gap between items */
        list-style: none;
      }

      .nav__links a {
        font-size: 0.9rem; /* Slightly smaller font */
        white-space: nowrap; /* Prevents text wrapping */
        padding: 8px 12px; /* Adjusted padding */
      }

      /* Make the "Get Started" button smaller */
      .nav__links .btn {
        min-width: 100px;
        padding: 8px 12px;
        font-size: 0.9rem;
      }

      /* Hide less important items on medium screens */
      @media (max-width: 1200px) {
        .nav__links li:nth-child(4),
        .nav__links li:nth-child(5) {
          display: none;
        }
      }

      /* Switch to hamburger menu earlier */
      @media (max-width: 992px) {
        .nav__links {
          display: none; /* Hide full menu */
        }
        .nav__menu__btn {
          display: block; /* Show hamburger */
        }
      }

      /* Icon styling to match your sample */
.icon-wrapper {
  display: inline-block;
  font-size: 2rem; /* Larger size */
  line-height: 1;
  margin-right: 1rem;
}

.icon-wrapper i {
  color: var(--icon-color);
  transition: transform 0.3s ease;
}

.job__card:hover .icon-wrapper i {
  transform: scale(1.1);
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
          <a href="#" class="logo"
            ><span style="font-size: 25px; font-weight: 700; color: #6a38c2">
              .hypersphere.
            </span></a
          >
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#talent">Find Talent</a></li>
        <li><a href="#service">Solutions</a></li>
        <li><a href="#client">Success Stories</a></li>
        <li><a href="./Notifications/notifications.html">Dashboard</a></li>
        <li>
          <button
            class="btn"
            onclick="window.location.href='loginReg.php'"
            style="font-family: 'League Spartan', sans-serif"
          >
           Become a Client
          </button>
        </li>
      </ul>
    </nav>
    <header class="section__container header__container" id="home">
      <img
        src="image/google.png "
        style="position: relative; right: 5px"
        alt="header"
      />
      <img src="image/twitter.png" alt="header" />
      <img src="image/amazon.png" alt="header" />
      <img src="image/figma.png" alt="header" />
      <img src="image/linkedin.png" alt="header" />
      <img src="image/microsoft.png" alt="header" />
      <h2>
        <img src="image/bag.png" alt="bag" />
        Trusted by 5,000+ Businesses Worldwide
      </h2>
      <h1>Access Top <span>Student Talent</span><br />For Your Projects</h1>
      <p>
        Connect with skilled student freelancers ready to tackle your projects.
        Get quality work at competitive rates while helping the next generation
        gain real-world experience.
      </p>
      <div class="header__btns">
        <button class="btn" onclick="window.location.href='#talent'">
          Browse Talent
        </button>
        <a
          href="https://youtu.be/ggHACGb0mtU?si=M-C4jYnhO-h6YiWe"
          target="_blank"
        >
          <span><i class="ri-play-fill"></i></span> How It Works?
        </a>
      </div>
    </header>

    <section class="steps" id="about">
      <div class="section__container steps__container">
        <h2 class="section__header">
          Hire Student Freelancers in <br />4 <span>Simple Steps</span>
        </h2>
        <p class="section__description">
          Our platform makes it easy to find, hire, and collaborate with
          talented students from top universities.
        </p>
        <div class="steps__grid">
          <div class="steps__card">
            <span><i class="ri-file-add-fill"></i></span>
            <h4>Post Your Project</h4>
            <p>
              Create a detailed project listing with your requirements, budget,
              and timeline. Our system will match you with qualified student
              freelancers.
            </p>
          </div>
          <div class="steps__card">
            <span><i class="ri-search-eye-fill"></i></span>
            <h4>Review Proposals</h4>
            <p>
              Receive applications from pre-vetted students. Review their
              portfolios, ratings, and proposals to find the perfect match for
              your project.
            </p>
          </div>
          <div class="steps__card">
            <span class="card__icon" style="background: #f0f7ff">
              <i class="ri-contract-fill" style="color: #2563eb"></i>
            </span>
            <h4>Hire & Collaborate</h4>
            <p>
              Select your preferred candidate and begin collaborating through
              our platform. Use our tools for communication, file sharing, and
              milestone tracking.
            </p>
          </div>
          <div class="steps__card">
            <span><i class="ri-checkbox-circle-fill"></i></span>
            <h4>Pay Upon Satisfaction</h4>
            <p>
              Only pay when you're satisfied with the delivered work. Our secure
              payment system ensures fair transactions for both parties.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container explore__container" id="talent">
      <h2 class="section__header">
        Find <span>Skilled Student Talent</span> Across All Fields
      </h2>
      <p class="section__description">
        Access a diverse pool of talented students from top universities, ready
        to contribute to your projects.
      </p>
      <div class="explore__grid">
        <div
          class="explore__card"
          onclick="window.location.href='design-talent.html'"
        >
          <span><i class="ri-pencil-ruler-2-fill"></i></span>
          <h4>Designers</h4>
          <p>UI/UX, Graphic, Product Design</p>
        </div>
        <div
          class="explore__card"
          onclick="window.location.href='design-talent.html'"
        >
          <span><i class="ri-code-fill"></i></span>
          <h4>Developers</h4>
          <p>Web, Mobile, Software</p>
        </div>
        <div
          class="explore__card"
          onclick="window.location.href='design-talent.html'"
        >
          <span><i class="ri-bar-chart-box-fill"></i></span>
          <h4>Data Specialists</h4>
          <p>Analytics, Science, Engineering</p>
        </div>
        <div
          class="explore__card"
          onclick="window.location.href='design-talent.html'"
        >
          <span><i class="ri-megaphone-fill"></i></span>
          <h4>Marketing</h4>
          <p>Digital, Content, Social Media</p>
        </div>
        <div
          class="explore__card"
          onclick="window.location.href='design-talent.html'"
        >
          <span><i class="ri-pen-nib-fill"></i></span>
          <h4>Writers</h4>
          <p>Content, Technical, Copywriting</p>
        </div>
        <div
          class="explore__card"
          onclick="window.location.href='design-talent.html'"
        >
          <span><i class="ri-calculator-fill"></i></span>
          <h4>Business</h4>
          <p>Consulting, Finance, Analysis</p>
        </div>
        <div
          class="explore__card"
          onclick="window.location.href='design-talent.html'"
        >
          <span><i class="ri-smartphone-fill"></i></span>
          <h4>Mobile Devs</h4>
          <p>iOS, Android, Cross-platform</p>
        </div>
        <div
          class="explore__card"
          onclick="window.location.href='design-talent.html'"
        >
          <span><i class="ri-database-2-fill"></i></span>
          <h4>AI/ML Engineers</h4>
          <p>Machine Learning, Neural Networks</p>
        </div>
      </div>
      <div class="explore__btn">
        <!-- <button
          class="btn"
          onclick="window.location.href='talent-categories.html'"
          style="font-family: 'League Spartan', sans-serif"
        >
          View All Talent Categories
        </button> -->
      </div>
    </section>

    <section class="section__container job__container">
  <h2 class="section__header">
    <span>Why Companies</span> Choose Hypersphere
  </h2>
  <p class="section__description">
    Discover the benefits of working with talented student freelancers
    through our platform.
  </p>

  <div class="job__grid">
    <!-- Cost Effective -->
    <div class="job__card">
      <div class="job__card__header">
        <span class="icon-wrapper" style="--icon-color: #10b981">
          <i class="ri-money-dollar-circle-fill"></i>
        </span>
        <div>
          <h5>Cost Effective</h5>
        </div>
      </div>
      <h4>Budget-Friendly Solutions</h4>
      <p>Access high-quality work at competitive student rates, helping you complete projects under budget without compromising on quality.</p>
    </div>

    <!-- Fresh Perspectives -->
    <div class="job__card">
      <div class="job__card__header">
        <span class="icon-wrapper" style="--icon-color: #3b82f6">
          <i class="ri-lightbulb-flash-fill"></i>
        </span>
        <div>
          <h5>Fresh Perspectives</h5>
        </div>
      </div>
      <h4>Innovative Approaches</h4>
      <p> Benefit from the latest academic knowledge and fresh perspectives that students bring from their cutting-edge education.</p>
    </div>

    <!-- Flexible Engagement -->
    <div class="job__card">
      <div class="job__card__header">
        <span class="icon-wrapper" style="--icon-color: #8b5cf6">
          <i class="ri-user-settings-fill"></i>
        </span>
        <div>
          <h5>Flexible Engagement</h5>
        </div>
      </div>
      <h4>Scale Your Team</h4>
      <p>            Easily scale your workforce up or down based on project needs, with
            no long-term commitments or overhead costs.</p>
    </div>

    <!-- Future Talent Pipeline -->
    <div class="job__card">
      <div class="job__card__header">
        <span class="icon-wrapper" style="--icon-color: #ec4899">
          <i class="ri-user-search-fill"></i>
        </span>
        <div>
          <h5>Future Talent Pipeline</h5>
        </div>
      </div>
      <h4>Recruitment Advantage</h4>
      <p>Identify and evaluate potential future full-time hires by working
            with them on real projects before making hiring decisions.</p>
    </div>

    <!-- Quick Turnaround -->
    <div class="job__card">
      <div class="job__card__header">
        <span class="icon-wrapper" style="--icon-color: #f59e0b">
          <i class="ri-timer-flash-fill"></i>
        </span>
        <div>
          <h5>Quick Turnaround</h5>
        </div>
      </div>
      <h4>Fast Project Completion</h4>
      <p>Students often have flexible schedules and can dedicate focused time
            to deliver quality work quickly.</p>
    </div>

    <!-- Diverse Skills -->
    <div class="job__card">
      <div class="job__card__header">
        <span class="icon-wrapper" style="--icon-color: #ef4444">
          <i class="ri-team-fill"></i>
        </span>
        <div>
          <h5>Diverse Skills</h5>
        </div>
      </div>
      <h4>Multidisciplinary Talent</h4>
      <p> Access students from various academic backgrounds who can bring
            interdisciplinary solutions to complex problems.</p>
    </div>
  </div>
</section>
    <section class="section__container offer__container" id="service">
      <h2 class="section__header">Our <span>Solutions</span></h2>
      <p class="section__description">
        Comprehensive services designed to meet your business needs and project
        requirements
      </p>
      <div class="offer__grid">
        <div class="offer__card">
          <img src="image/offer-1.jpg" alt="solution" />
          <div class="offer__details">
            <span>01</span>
            <div>
              <h4>Project Matching</h4>
              <p>
                Our AI-powered system matches your project with the most
                suitable student freelancers based on skills, experience, and
                academic background.
              </p>
            </div>
          </div>
        </div>
        <div class="offer__card">
          <img src="image/offer-2.jpg" alt="solution" />
          <div class="offer__details">
            <span>02</span>
            <div>
              <h4>Managed Services</h4>
              <p>
                Let our team handle the entire process - from talent selection
                to project management - so you can focus on your core business.
              </p>
            </div>
          </div>
        </div>
        <div class="offer__card">
          <img src="image/offer-3.jpg" alt="solution" />
          <div class="offer__details">
            <span>03</span>
            <div>
              <h4>Campus Recruitment</h4>
              <p>
                Special programs to help you identify and recruit top student
                talent for internships and full-time positions after graduation.
              </p>
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
