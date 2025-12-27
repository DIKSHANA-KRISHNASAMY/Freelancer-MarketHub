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
    <link
      href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    <title>Hypersphere</title>

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

      :root {
        --primary-color: #6a38c2;
        --primary-color-dark: #6132b4;
        --text-dark: #262626;
        --text-light: #737373;
        --extra-light: #e5e5e5;
        --white: #ffffff;
        --max-width: 1200px;
      }

      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }

      .section__container {
        max-width: var(--max-width);
        margin: auto;
        padding: 5rem 1rem;
      }

      .section__header {
        max-width: 900px;
        margin-inline: auto;
        margin-bottom: 1rem;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-dark);
        text-align: center;
      }

      .section__header span {
        color: var(--primary-color);
      }

      .section__description {
        max-width: 600px;
        margin-inline: auto;
        color: var(--text-light);
        line-height: 1.75rem;
        text-align: center;
      }

      .btn {
        padding: 1rem 2rem;
        outline: none;
        border: none;
        font-size: 1rem;
        color: var(--white);
        background-color: var(--primary-color);
        border-radius: 5px;
        transition: 0.3s;
        cursor: pointer;
      }

      .btn:hover {
        background-color: var(--primary-color-dark);
        box-shadow: 2px 2px 10px rgba(106, 56, 194, 0.5);
      }

      .logo {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
      }

      .logo span {
        color: #fa6021;
      }

      img {
        display: flex;
        width: 100%;
      }

      a {
        text-decoration: none;
        transition: 0.3s;
      }

      ul {
        list-style: none;
      }

      html,
      body {
        scroll-behavior: smooth;
      }

      body {
        font-family: "Poppins", sans-serif;
      }

      nav {
        position: fixed;
        isolation: isolate;
        width: 100%;
        max-width: var(--max-width);
        margin-inline: auto;
        z-index: 9;
      }

      .nav__header {
        padding: 1rem;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: var(--extra-light);
      }

      .nav__menu__btn {
        font-size: 1.5rem;
        color: var(--text-dark);
        cursor: pointer;
      }

      .nav__links {
        position: absolute;
        top: 65px;
        left: 0;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 2rem;
        padding: 2rem;
        background-color: var(--extra-light);
        transition: 0.5s;
        z-index: -1;
        transform: translateY(-100%);
      }

      .nav__links.open {
        transform: translateY(0);
      }

      .nav__links a {
        font-weight: 500;
        color: var(--text-dark);
      }

      .nav__links a:hover {
        color: var(--primary-color);
      }

      .header__container {
        position: relative;
        isolation: isolate;
        overflow: hidden;
      }

      .header__container h2 {
        max-width: fit-content;
        margin-inline: auto;
        margin-bottom: 1rem;
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.9rem;
        font-weight: 600;
        color: #fa6021;
        background-color: #fff8f5;
        border-radius: 5rem;
      }

      .header__container h2 img {
        max-width: 25px;
      }

      .header__container h1 {
        margin-bottom: 1rem;
        font-size: 4rem;
        font-weight: 700;
        color: var(--text-dark);
        text-align: center;
        line-height: 5.5rem;
      }

      .header__container h1 span {
        color: var(--primary-color);
      }

      .header__container p {
        margin-bottom: 2rem;
        max-width: 600px;
        margin-inline: auto;
        color: var(--text-light);
        line-height: 2rem;
        text-align: center;
      }

      .header__btns {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2rem;
      }

      .header__btns a {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1rem;
        font-weight: 500;
        color: var(--text-dark);
      }

      .header__btns a span {
        padding: 5px 11px;
        font-size: 1.5rem;
        color: var(--white);
        background-color: var(--primary-color);
        border-radius: 100%;
        transition: 0.3s;
      }

      .header__btns a:hover span {
        box-shadow: 2px 2px 10px rgba(106, 56, 194, 0.5);
      }

      .header__container > img {
        position: absolute;
        max-width: 40px;
        padding: 7px;
        border-radius: 100%;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        z-index: -1;
      }

      .header__container > img:nth-child(1) {
        top: 30%;
        left: 20%;
        transform: translate(-50%, -50%);
      }

      .header__container > img:nth-child(2) {
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
      }

      .header__container > img:nth-child(3) {
        top: 75%;
        left: 25%;
        transform: translate(-50%, -50%);
      }

      .header__container > img:nth-child(4) {
        top: 20%;
        right: 15%;
        transform: translate(-50%, -50%);
      }

      .header__container > img:nth-child(5) {
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
      }

      .header__container > img:nth-child(6) {
        top: 65%;
        right: 20%;
        transform: translate(-50%, -50%);
      }

      .steps {
        background-image: url("assets/steps-bg.png");
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
      }

      .steps__grid {
        margin-top: 4rem;
        display: grid;
        gap: 1rem;
      }

      .steps__card {
        padding: 1rem;
        background-color: var(--white);
        border-radius: 5px;
        box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.1);
      }

      .steps__card span {
        display: inline-block;
        margin-bottom: 1rem;
        padding: 5px 11px;
        font-size: 1.5rem;
        border-radius: 100%;
      }

      .steps__card:nth-child(1) span {
        color: #fa4e09;
        background-color: #fff9f6;
      }

      .steps__card:nth-child(2) span {
        color: #6a38c2;
        background-color: #e9ddff;
      }

      .steps__card:nth-child(3) span {
        color: #3ac2ba;
        background-color: #f0fffe;
      }

      .steps__card:nth-child(4) span {
        color: #fbbc09;
        background-color: #fff8e3;
      }

      .steps__card h4 {
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-dark);
      }

      .steps__card p {
        color: var(--text-light);
      }

      .explore__grid {
        margin-block: 4rem;
        display: grid;
        gap: 1rem;
      }

      .explore__card {
        padding: 1rem;
        border-radius: 5px;
        box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
      }

      .explore__card:hover {
        background-color: var(--primary-color);
      }

      .explore__card span {
        display: inline-block;
        margin-bottom: 1rem;
        padding: 5px 11px;
        font-size: 1.5rem;
        border-radius: 5px;
        transition: 0.3s;
      }

      .explore__card:nth-child(1) span {
        color: #f04a0c;
        background-color: #f6efef;
      }

      .explore__card:nth-child(2) span {
        color: #6a38c2;
        background-color: #e9ddff;
      }

      .explore__card:nth-child(3) span {
        color: #ff0101;
        background-color: #fff2f2;
      }

      .explore__card:nth-child(4) span {
        color: #fbbc09;
        background-color: #fff8e3;
      }

      .explore__card:nth-child(5) span {
        color: #4680e7;
        background-color: #e7edf8;
      }

      .explore__card:nth-child(6) span {
        color: #34a753;
        background-color: #f1fef5;
      }

      .explore__card:nth-child(7) span {
        color: #443ee0;
        background-color: #f6f5ff;
      }

      .explore__card:nth-child(8) span {
        color: #3ac2ba;
        background-color: #f0fffe;
      }

      .explore__card:hover span {
        color: var(--white);
        background-color: #794cc7;
      }

      .explore__card h4 {
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-dark);
        transition: 0.3s;
      }

      .explore__card p {
        color: var(--text-light);
        transition: 0.3s;
      }

      .explore__card:hover h4 {
        color: var(--white);
      }

      .explore__card:hover p {
        color: var(--extra-light);
      }

      .explore__btn {
        text-align: center;
      }

      .job__grid {
        margin-top: 4rem;
        display: grid;
        gap: 1rem;
      }

      .job__card {
        padding: 1rem;
        border-radius: 5px;
        box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
      }

      .job__card:hover {
        background-color: var(--primary-color);
      }

      .job__card__header {
        display: flex;
        align-items: center;
        gap: 1rem;
      }

      .job__card img {
        max-width: 50px;
        padding: 10px;
        border-radius: 100%;
        background-color: var(--white);
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
      }

      .job__card h5 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-dark);
        transition: 0.3s;
      }

      .job__card h6 {
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--text-light);
        transition: 0.3s;
      }

      .job__card h4 {
        margin-block: 1rem 0.5rem;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-dark);
        transition: 0.3s;
      }

      .job__card p {
        margin-bottom: 1rem;
        color: var(--text-light);
        transition: 0.3s;
      }

      .job__card__footer {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 5px;
      }

      .job__card__footer span {
        display: inline-block;
        padding: 4px 10px;
        font-size: 0.8rem;
        font-weight: 500;
        border-radius: 5px;
        transition: 0.3s;
      }

      .job__card__footer span:nth-child(1) {
        color: #4680e7;
        background-color: #e7edf8;
      }

      .job__card__footer span:nth-child(2) {
        color: #f04a0c;
        background-color: #f6efef;
      }

      .job__card__footer span:nth-child(3) {
        color: #3ac2ba;
        background-color: #f0fffe;
      }

      .job__card:hover :is(h5, h4) {
        color: var(--white);
      }

      .job__card:hover :is(h6, p) {
        color: var(--extra-light);
      }

      .job__card:hover .job__card__footer span {
        color: var(--white);
        background-color: var(--primary-color-dark);
      }

      .offer__grid {
        margin-top: 4rem;
        display: grid;
        gap: 2rem 1rem;
      }

      .offer__card img {
        margin-bottom: 1rem;
        border-radius: 5px;
      }

      .offer__details {
        display: flex;
        align-items: flex-start;
      }

      .offer__details span {
        font-size: 2rem;
        font-weight: 800;
        -webkit-text-fill-color: transparent;
        -webkit-text-stroke: 1px var(--text-dark);
        padding-right: 1rem;
      }

      .offer__details div {
        padding-left: 1rem;
        border-left: 2px solid var(--primary-color);
      }

      .offer__details h4 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-dark);
      }

      .offer__details p {
        color: var(--text-light);
      }

      .swiper {
        padding-top: 4rem;
        width: 100%;
        max-width: 600px;
      }

      .client__card img {
        max-width: 80px;
        margin-inline: auto;
        margin-bottom: 2rem;
        border-radius: 100%;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
      }

      .client__card p {
        margin-bottom: 1rem;
        line-height: 1.75rem;
        color: var(--text-dark);
        text-align: center;
      }

      .client__ratings {
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
      }

      .client__ratings span {
        color: goldenrod;
      }

      .client__card h4 {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-dark);
        text-align: center;
      }

      .client__card h5 {
        font-size: 1rem;
        font-weight: 500;
        color: var(--text-light);
        text-align: center;
      }






      @media (width > 540px) {
        .steps__grid {
          grid-template-columns: repeat(2, 1fr);
        }

        .explore__grid {
          grid-template-columns: repeat(2, 1fr);
        }

        .job__grid {
          grid-template-columns: repeat(2, 1fr);
        }

        .offer__grid {
          grid-template-columns: repeat(2, 1fr);
        }

        .footer__container {
          grid-template-columns: repeat(2, 1fr);
        }
      }

      @media (width > 768px) {
        nav {
          position: static;
          padding: 2rem 1rem;
          display: flex;
          align-items: center;
          justify-content: space-between;
          gap: 2rem;
        }

        .nav__header {
          padding: 0;
          background-color: transparent;
        }

        .nav__menu__btn {
          display: none;
        }

        .nav__links {
          position: static;
          padding: 0;
          flex-direction: row;
          justify-content: flex-end;
          background-color: transparent;
          transform: none;
        }

        .steps__grid {
          margin-top: 6rem;
          grid-template-columns: repeat(4, 1fr);
        }

        .steps__card:nth-child(2n - 1) {
          transform: translateY(-2rem);
        }

        .explore__grid {
          grid-template-columns: repeat(4, 1fr);
        }

        .job__grid {
          grid-template-columns: repeat(3, 1fr);
        }

        .offer__grid {
          grid-template-columns: repeat(3, 1fr);
        }

        .footer__container {
          grid-template-columns: repeat(5, 1fr);
        }

        .footer__col:nth-child(1) {
          grid-column: 1/3;
        }
      }

      @media (width > 1024px) {
        .steps__card {
          padding: 1.5rem;
        }

        .explore__card {
          padding: 1.5rem;
        }

        .offer__grid {
          gap: 2rem;
        }
      }

      .nav__links .btn {
        min-width: 120px;
        padding: 10px 20px;
        white-space: nowrap;
      }
      .split-cta {
        display: flex;
        gap: 1rem;
        justify-content: center;
      }
      @media (max-width: 768px) {
        .split-cta {
          flex-direction: column;
          align-items: center;
        }
      }

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

      .community-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
      }

      .community-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 1.5rem;
        border-radius: 10px;
        background: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
      }

      .community-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(106, 56, 194, 0.2);
      }

      .community-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 1rem;
      }

      .community-icon.discord {
        background: rgba(88, 101, 242, 0.1);
        color: #5865f2;
      }

      .community-icon.linkedin {
        background: rgba(10, 102, 194, 0.1);
        color: #0a66c2;
      }

      .community-icon.slack {
        background: rgba(74, 21, 75, 0.1);
        color: #4a154b;
      }

      .community-icon.twitter {
        background: rgba(0, 0, 0, 0.1);
        color: #000000;
      }

      .community-card h3 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: #333;
      }

      .community-card p {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 1rem;
        line-height: 1.5;
      }

      .join-text {
        color: #6a38c2;
        font-weight: 600;
        font-size: 0.9rem;
        margin-top: auto;
      }

      @media (max-width: 768px) {
        .community-grid {
          grid-template-columns: repeat(2, 1fr);
        }
      }

      @media (max-width: 480px) {
        .community-grid {
          grid-template-columns: 1fr;
        }
      }

      .community-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1.5rem;
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 1rem;
      }

      .community-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 1.5rem 1rem;
        transition: all 0.3s ease;
        text-decoration: none;
      }

      .community-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(106, 56, 194, 0.2) !important;
      }

      .community-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
      }

      .community-card:hover .community-icon {
        transform: scale(1.1);
      }

      .join-btn {
        transition: all 0.3s ease;
      }

      .community-card:hover .join-btn {
        background: var(--primary-color-dark) !important;
      }

      @media (max-width: 768px) {
        .community-grid {
          grid-template-columns: repeat(2, 1fr);
        }
      }

      @media (max-width: 480px) {
        .community-grid {
          grid-template-columns: 1fr;
          max-width: 300px;
        }
      }

      /* Testimonials Section Styles */
      .testimonials-container {
        position: relative;
        margin-top: 3rem;
        overflow: hidden;
        width: 100vw;
        margin-left: calc(-50vw + 50%);
      }

      .testimonials-grid {
        display: flex;
        animation: ticker 15s linear infinite;
        width: 200%;
      }

      .testimonials-grid:hover {
        animation-play-state: paused;
      }

      .testimonial-card {
        background: var(--white);
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        flex: 0 0 calc(33.333% - 1.33rem);
        margin-right: 2rem;
        min-height: 100%;
        height: 386px;
        max-width: 368px;
        display: flex;
        flex-direction: column;
      }

      .testimonial-card:last-child {
        margin-right: 0;
      }

      .testimonial-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(106, 56, 194, 0.15);
      }

      .testimonial-card::before {
        content: '"';
        position: absolute;
        top: 20px;
        left: 20px;
        font-family: Georgia, serif;
        font-size: 5rem;
        color: rgba(106, 56, 194, 0.1);
        line-height: 1;
        z-index: 1;
      }

      .testimonial-content {
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        height: 100%;
      }

      .testimonial-text {
        font-size: 1rem;
        line-height: 1.75;
        color: var(--text-dark);
        margin-bottom: 2rem;
        font-style: italic;
        position: relative;
        flex-grow: 1;
      }

      .testimonial-author {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: auto;
      }

      .author-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--primary-color);
      }

      .author-info h4 {
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.25rem;
      }

      .author-info p {
        color: var(--primary-color);
        font-size: 0.9rem;
        font-weight: 500;
      }

      .company-logo {
        height: 30px;
        margin-top: 0.5rem;
        opacity: 0.8;
        transition: opacity 0.3s;
      }

      .testimonial-card:hover .company-logo {
        opacity: 1;
      }

      .stats-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-top: 4rem;
        text-align: center;
      }

      .stat-item {
        background: var(--white);
        padding: 2rem 1rem;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      }

      .stat-number {
        font-family: "League Spartan", sans-serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
      }

      .stat-label {
        color: var(--text-light);
        font-size: 0.9rem;
      }

      @media (max-width: 768px) {
        .testimonial-card {
          flex: 0 0 calc(50% - 1rem);
        }

        .stats-container {
          grid-template-columns: repeat(2, 1fr);
        }
      }

      @media (max-width: 480px) {
        .testimonial-card {
          flex: 0 0 100%;
        }

        .stats-container {
          grid-template-columns: 1fr;
        }
      }

      /* Animations */
      @keyframes ticker {
        0% {
          transform: translateX(0);
        }
        100% {
          transform: translateX(-50%);
        }
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .testimonial-card {
        animation: fadeIn 0.6s ease forwards;
        opacity: 0;
      }

      .testimonial-card:nth-child(1) {
        animation-delay: 1s;
      }
      .testimonial-card:nth-child(2) {
        animation-delay: 3s;
      }
      .testimonial-card:nth-child(3) {
        animation-delay: 5s;
      }
      .stat-item {
        animation: fadeIn 0.6s ease forwards;
      }
      .stat-item:nth-child(1) {
        animation-delay: 0.7s;
      }
      .stat-item:nth-child(2) {
        animation-delay: 0.8s;
      }
      .stat-item:nth-child(3) {
        animation-delay: 0.9s;
      }
      .stat-item:nth-child(4) {
        animation-delay: 1s;
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
        <li><a href="#how-it-works">How It Works?</a></li>
        <li><a href="#explore">Explore</a></li>
        <li><a href="#testimonials">Success Stories</a></li>
        <li><a href="#connect">Connect</a></li>
        <li>
          <button
            class="btn"
            onclick="window.location.href='loginReg.php'"
            style="font-family: 'League Spartan', sans-serif"
          >
            Get Started
          </button>
        </li>
      </ul>
    </nav>

    <header class="section__container header__container" id="home">
      <img
        src="image/google.png"
        alt="Google logo"
        style="position: relative; top: 12px"
      />
      <img src="image/twitter.png" alt="Twitter logo" />
      <img src="image/amazon.png" alt="Amazon logo" />
      <img src="image/figma.png" alt="Figma logo" />
      <img src="image/linkedin.png" alt="LinkedIn logo" />
      <img src="image/microsoft.png" alt="Microsoft logo" />

      <h2>
        <img src="image/bag.png" alt="Briefcase icon" />
        Trusted by Students and Businesses Worldwide
      </h2>

      <h1>
        Where Student Talent Meets <span> <br />Real-World </span>Projects
      </h1>

      <p>
        Hypersphere connects ambitious students with businesses looking for
        fresh talent. Whether you're looking to hire skilled freelancers or find
        meaningful work, we've got you covered.
      </p>

      <div class="split-cta">
        <button
          class="btn"
          onclick="window.location.href='index-freelancer.php'"
        >
          I'm a Student Freelancer
        </button>
        <button
          class="btn"
          onclick="window.location.href='index-client.php'"
          style="background: #fff; color: #6a38c2; border: 1px solid #6a38c2"
        >
          I Need to Hire Talent
        </button>
      </div>
    </header>

    <section class="steps" id="about">
      <div class="section__container steps__container">
        <h2 class="section__header">The <span>Hypersphere</span> Advantage</h2>
        <p class="section__description">
          Our platform is designed to benefit both students and businesses
          through meaningful collaborations and real-world experience.
        </p>
        <div class="steps__grid">
          <div class="steps__card">
            <span><i class="ri-user-voice-fill"></i></span>
            <h4>For Students</h4>
            <p>
              Build your portfolio with real projects, earn while you learn, and
              gain valuable experience that sets you apart in the job market.
            </p>
          </div>
          <div class="steps__card">
            <span><i class="ri-briefcase-4-fill"></i></span>
            <h4>For Businesses</h4>
            <p>
              Access affordable, high-quality talent with fresh perspectives and
              up-to-date skills from top universities.
            </p>
          </div>
          <div class="steps__card">
            <span><i class="ri-shake-hands-fill"></i></span>
            <h4>Win-Win Ecosystem</h4>
            <p>
              Students get real experience, businesses get quality work, and
              everyone builds valuable professional connections.
            </p>
          </div>
          <div class="steps__card">
            <span><i class="ri-medal-fill"></i></span>
            <h4>Verified Talent</h4>
            <p>
              All students are verified through their academic credentials,
              ensuring you work with genuine, qualified candidates.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container" id="how-it-works">
      <h2 class="section__header">How Hypersphere <span>Works</span></h2>
      <div class="steps__grid">
        <div class="steps__card">
          <span>1</span>
          <h4>Create Your Profile</h4>
          <p>
            Students showcase their skills, businesses outline their needs. Our
            verification ensures quality on both sides.
          </p>
        </div>
        <div class="steps__card">
          <span>2</span>
          <h4>Find Your Match</h4>
          <p>
            Our smart matching system connects students with relevant projects
            and businesses with ideal candidates.
          </p>
        </div>
        <div class="steps__card">
          <span>3</span>
          <h4>Collaborate Securely</h4>
          <p>
            Work together using our platform's tools for communication, file
            sharing, and milestone tracking.
          </p>
        </div>
        <div class="steps__card">
          <span>4</span>
          <h4>Grow Together</h4>
          <p>
            Students build portfolios, businesses complete projects, and often
            continue working together long-term.
          </p>
        </div>
      </div>
    </section>

    <section class="section__container explore__container" id="explore">
      <h2 class="section__header">Explore <span>Opportunities</span></h2>
      <p class="section__description">
        Whether you're looking to hire or be hired, we've got opportunities
        across all major industries and disciplines.
      </p>
      <div class="explore__grid">
        <div class="explore__card">
          <span><i class="ri-pencil-ruler-2-fill"></i></span>
          <h4>Design & Creative</h4>
          <p>UI/UX, Graphic Design, Illustration</p>
        </div>
        <div class="explore__card">
          <span><i class="ri-code-fill"></i></span>
          <h4>Development</h4>
          <p>Web, Mobile, Software Engineering</p>
        </div>
        <div class="explore__card">
          <span><i class="ri-bar-chart-box-fill"></i></span>
          <h4>Business</h4>
          <p>Consulting, Finance, Marketing</p>
        </div>
        <div class="explore__card">
          <span><i class="ri-database-2-fill"></i></span>
          <h4>Data Science</h4>
          <p>Analytics, Machine Learning, AI</p>
        </div>
        <div class="explore__card">
          <span><i class="ri-article-fill"></i></span>
          <h4>Writing & Content</h4>
          <p>Copywriting, Technical Writing, Blogging</p>
        </div>
        <div class="explore__card">
          <span><i class="ri-smartphone-fill"></i></span>
          <h4>Mobile Development</h4>
          <p>iOS, Android, React Native</p>
        </div>
        <div class="explore__card">
          <span><i class="ri-cloud-fill"></i></span>
          <h4>Cloud Computing</h4>
          <p>AWS, Azure, Google Cloud</p>
        </div>
        <div class="explore__card">
          <span><i class="ri-customer-service-2-fill"></i></span>
          <h4>Customer Support</h4>
          <p>Helpdesk, Chat Support, Technical Support</p>
        </div>
      </div>
    </section>

    <!-- Integrated Testimonials Section -->

      <section class="section__container explore__container" id="testimonials">
      <h2 class="section__header">Transforming <span>Student Talent</span> Into Success</h2>
      <p class="section__description">
      Don't just take our word for it. See how Hypersphere has helped
          students land dream opportunities and businesses find exceptional
          talent.
      </p>

      <div class="testimonials-container">
        <div class="testimonials-grid" id="testimonials-carousel">
          <!-- Original Cards -->
          <div class="testimonial-card">
            <div class="testimonial-content">
              <p class="testimonial-text">
                "Our Hypersphere freelancer designed an entire feature for our
                mobile app that now serves 2M+ users. The quality was
                indistinguishable from our senior engineers - we ended up hiring
                her full-time after graduation."
              </p>
              <div class="testimonial-author">
                <img
                  src="https://randomuser.me/api/portraits/women/45.jpg"
                  alt="Sarah Chen"
                  class="author-avatar"
                />
                <div class="author-info">
                  <h4>Sarah Chen</h4>
                  <p>Engineering Manager, Google</p>
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg"
                    alt="Google"
                    class="company-logo"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="testimonial-card">
            <div class="testimonial-content">
              <p class="testimonial-text">
                "As a CS student, I never imagined I'd work with Fortune 500
                companies. Through Hypersphere, I've completed 12 projects for
                Microsoft, Amazon, and Unilever - building both my portfolio and
                confidence."
              </p>
              <div class="testimonial-author">
                <img
                  src="https://randomuser.me/api/portraits/men/32.jpg"
                  alt="Rahul Patel"
                  class="author-avatar"
                />
                <div class="author-info">
                  <h4>Rahul Patel</h4>
                  <p>Top-Rated Freelancer</p>
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg"
                    alt="Microsoft"
                    class="company-logo"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="testimonial-card">
            <div class="testimonial-content">
              <p class="testimonial-text">
                "We hired 3 designers through Hypersphere to revamp our brand
                identity. The fresh perspectives from these students
                outperformed expensive agencies. The ROI was incredible - 40%
                increase in engagement."
              </p>
              <div class="testimonial-author">
                <img
                  src="https://randomuser.me/api/portraits/women/68.jpg"
                  alt="Jessica Williams"
                  class="author-avatar"
                />
                <div class="author-info">
                  <h4>Jessica Williams</h4>
                  <p>CMO, Airbnb</p>
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/6/69/Airbnb_Logo_B%C3%A9lo.svg"
                    alt="Airbnb"
                    class="company-logo"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="testimonial-card">
            <div class="testimonial-content">
              <p class="testimonial-text">
                "The AI model developed by our Hypersphere intern reduced our
                processing time by 65%. We were so impressed that we
                fast-tracked their hiring process before they graduated."
              </p>
              <div class="testimonial-author">
                <img
                  src="https://randomuser.me/api/portraits/men/45.jpg"
                  alt="David Kim"
                  class="author-avatar"
                />
                <div class="author-info">
                  <h4>David Kim</h4>
                  <p>Director of AI, Tesla</p>
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/b/bd/Tesla_Motors.svg"
                    alt="Tesla"
                    class="company-logo"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="testimonial-card">
            <div class="testimonial-content">
              <p class="testimonial-text">
                "Hypersphere connected us with brilliant minds we wouldn't have
                found otherwise. Two of our current product leads started as
                student freelancers through this platform."
              </p>
              <div class="testimonial-author">
                <img
                  src="https://randomuser.me/api/portraits/women/32.jpg"
                  alt="Maria Garcia"
                  class="author-avatar"
                />
                <div class="author-info">
                  <h4>Maria Garcia</h4>
                  <p>VP Product, Spotify</p>
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/1/19/Spotify_logo_without_text.svg"
                    alt="Spotify"
                    class="company-logo"
                  />
                </div>
              </div>
            </div>
          </div>

          <!-- Duplicated Cards -->
          <div class="testimonial-card">
            <div class="testimonial-content">
              <p class="testimonial-text">
                "Our Hypersphere freelancer designed an entire feature for our
                mobile app that now serves 2M+ users. The quality was
                indistinguishable from our senior engineers - we ended up hiring
                her full-time after graduation."
              </p>
              <div class="testimonial-author">
                <img
                  src="https://randomuser.me/api/portraits/women/45.jpg"
                  alt="Sarah Chen"
                  class="author-avatar"
                />
                <div class="author-info">
                  <h4>Sarah Chen</h4>
                  <p>Engineering Manager, Google</p>
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg"
                    alt="Google"
                    class="company-logo"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="testimonial-card">
            <div class="testimonial-content">
              <p class="testimonial-text">
                "As a CS student, I never imagined I'd work with Fortune 500
                companies. Through Hypersphere, I've completed 12 projects for
                Microsoft, Amazon, and Unilever - building both my portfolio and
                confidence."
              </p>
              <div class="testimonial-author">
                <img
                  src="https://randomuser.me/api/portraits/men/32.jpg"
                  alt="Rahul Patel"
                  class="author-avatar"
                />
                <div class="author-info">
                  <h4>Rahul Patel</h4>
                  <p>Top-Rated Freelancer</p>
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg"
                    alt="Microsoft"
                    class="company-logo"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="testimonial-card">
            <div class="testimonial-content">
              <p class="testimonial-text">
                "We hired 3 designers through Hypersphere to revamp our brand
                identity. The fresh perspectives from these students
                outperformed expensive agencies. The ROI was incredible - 40%
                increase in engagement."
              </p>
              <div class="testimonial-author">
                <img
                  src="https://randomuser.me/api/portraits/women/68.jpg"
                  alt="Jessica Williams"
                  class="author-avatar"
                />
                <div class="author-info">
                  <h4>Jessica Williams</h4>
                  <p>CMO, Airbnb</p>
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/6/69/Airbnb_Logo_B%C3%A9lo.svg"
                    alt="Airbnb"
                    class="company-logo"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="testimonial-card">
            <div class="testimonial-content">
              <p class="testimonial-text">
                "The AI model developed by our Hypersphere intern reduced our
                processing time by 65%. We were so impressed that we
                fast-tracked their hiring process before they graduated."
              </p>
              <div class="testimonial-author">
                <img
                  src="https://randomuser.me/api/portraits/men/45.jpg"
                  alt="David Kim"
                  class="author-avatar"
                />
                <div class="author-info">
                  <h4>David Kim</h4>
                  <p>Director of AI, Tesla</p>
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/b/bd/Tesla_Motors.svg"
                    alt="Tesla"
                    class="company-logo"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="testimonial-card">
            <div class="testimonial-content">
              <p class="testimonial-text">
                "Hypersphere connected us with brilliant minds we wouldn't have
                found otherwise. Two of our current product leads started as
                student freelancers through this platform."
              </p>
              <div class="testimonial-author">
                <img
                  src="https://randomuser.me/api/portraits/women/32.jpg"
                  alt="Maria Garcia"
                  class="author-avatar"
                />
                <div class="author-info">
                  <h4>Maria Garcia</h4>
                  <p>VP Product, Spotify</p>
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/1/19/Spotify_logo_without_text.svg"
                    alt="Spotify"
                    class="company-logo"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Stats Section -->
      <div class="stats-container">
        <div class="stat-item">
          <div class="stat-number">5,000+</div>
          <div class="stat-label">Projects Completed</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">93%</div>
          <div class="stat-label">Client Satisfaction</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">₹50M+</div>
          <div class="stat-label">Earned by Students</div>
        </div>
        <div class="stat-item">
          <div class="stat-number">300+</div>
          <div class="stat-label">Top Companies Hiring</div>
        </div>
      </div>
    </section>

    <section
      class="section__container cta__container"
      style="text-align: center"
      id="connect"
    >
      <h2 class="section__header">Join Our <span>Communities</span></h2>
      <p
        class="section__description"
        style="max-width: 700px; margin: 0 auto 2rem"
      >
        Connect with fellow students, businesses, and opportunities through our
        active communities. Get updates, network, and find collaborations.
      </p>

      <div class="community-grid" style="justify-content: center">
        <!-- Discord Card -->
        <a
          href="[YOUR_DISCORD_LINK]"
          class="community-card"
          target="_blank"
          style="
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(106, 56, 194, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
          "
        >
          <div
            class="community-icon"
            style="background: rgba(88, 101, 242, 0.1); color: #5865f2"
          >
            <i class="ri-discord-fill"></i>
          </div>
          <h3 style="color: #333; margin: 0.5rem 0">Discord</h3>
          <p
            style="
              color: #666;
              font-size: 0.9rem;
              margin-bottom: 1rem;
              flex-grow: 1;
            "
          >
            Real-time chat & networking
          </p>
          <span
            class="join-btn"
            style="
              background: #6a38c2;
              color: white;
              padding: 8px 16px;
              border-radius: 20px;
              font-size: 0.9rem;
              margin-top: auto;
            "
            >Join Now</span
          >
        </a>

        <!-- LinkedIn Card -->
        <a
          href="[YOUR_LINKEDIN_LINK]"
          class="community-card"
          target="_blank"
          style="
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(106, 56, 194, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
          "
        >
          <div
            class="community-icon"
            style="background: rgba(10, 102, 194, 0.1); color: #0a66c2"
          >
            <i class="ri-linkedin-box-fill"></i>
          </div>
          <h3 style="color: #333; margin: 0.5rem 0">LinkedIn</h3>
          <p
            style="
              color: #666;
              font-size: 0.9rem;
              margin-bottom: 1rem;
              flex-grow: 1;
            "
          >
            Professional network
          </p>
          <span
            class="join-btn"
            style="
              background: #6a38c2;
              color: white;
              padding: 8px 16px;
              border-radius: 20px;
              font-size: 0.9rem;
              margin-top: auto;
            "
            >Follow Us</span
          >
        </a>

        <!-- Slack Card -->
        <a
          href="[YOUR_SLACK_LINK]"
          class="community-card"
          target="_blank"
          style="
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(106, 56, 194, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
          "
        >
          <div
            class="community-icon"
            style="background: rgba(74, 21, 75, 0.1); color: #4a154b"
          >
            <i class="ri-slack-fill"></i>
          </div>
          <h3 style="color: #333; margin: 0.5rem 0">Slack</h3>
          <p
            style="
              color: #666;
              font-size: 0.9rem;
              margin-bottom: 1rem;
              flex-grow: 1;
            "
          >
            Project collaborations
          </p>
          <span
            class="join-btn"
            style="
              background: #6a38c2;
              color: white;
              padding: 8px 16px;
              border-radius: 20px;
              font-size: 0.9rem;
              margin-top: auto;
            "
            >Join Workspace</span
          >
        </a>

        <!-- Twitter Card -->
        <a
          href="[YOUR_TWITTER_LINK]"
          class="community-card"
          target="_blank"
          style="
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(106, 56, 194, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
          "
        >
          <div
            class="community-icon"
            style="background: rgba(29, 161, 242, 0.1); color: #1da1f2"
          >
            <i class="ri-twitter-x-fill"></i>
          </div>
          <h3 style="color: #333; margin: 0.5rem 0">Twitter/X</h3>
          <p
            style="
              color: #666;
              font-size: 0.9rem;
              margin-bottom: 1rem;
              flex-grow: 1;
            "
          >
            Updates & announcements
          </p>
          <span
            class="join-btn"
            style="
              background: #6a38c2;
              color: white;
              padding: 8px 16px;
              border-radius: 20px;
              font-size: 0.9rem;
              margin-top: auto;
            "
            >Follow Us</span
          >
        </a>

        <!-- GitHub Card -->
        <a
          href="[YOUR_GITHUB_LINK]"
          class="community-card"
          target="_blank"
          style="
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(106, 56, 194, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
          "
        >
          <div
            class="community-icon"
            style="background: rgba(36, 41, 46, 0.1); color: #24292e"
          >
            <i class="ri-github-fill"></i>
          </div>
          <h3 style="color: #333; margin: 0.5rem 0">GitHub</h3>
          <p
            style="
              color: #666;
              font-size: 0.9rem;
              margin-bottom: 1rem;
              flex-grow: 1;
            "
          >
            Open-source projects
          </p>
          <span
            class="join-btn"
            style="
              background: #6a38c2;
              color: white;
              padding: 8px 16px;
              border-radius: 20px;
              font-size: 0.9rem;
              margin-top: auto;
            "
            >Contribute</span
          >
        </a>

        <!-- Facebook Card -->
        <a
          href="[YOUR_FACEBOOK_LINK]"
          class="community-card"
          target="_blank"
          style="
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(106, 56, 194, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
          "
        >
          <div
            class="community-icon"
            style="background: rgba(24, 119, 242, 0.1); color: #1877f2"
          >
            <i class="ri-facebook-fill"></i>
          </div>
          <h3 style="color: #333; margin: 0.5rem 0">Facebook</h3>
          <p
            style="
              color: #666;
              font-size: 0.9rem;
              margin-bottom: 1rem;
              flex-grow: 1;
            "
          >
            Community groups
          </p>
          <span
            class="join-btn"
            style="
              background: #6a38c2;
              color: white;
              padding: 8px 16px;
              border-radius: 20px;
              font-size: 0.9rem;
              margin-top: auto;
            "
            >Join Group</span
          >
        </a>

        <!-- WhatsApp Card -->
        <a
          href="[YOUR_WHATSAPP_LINK]"
          class="community-card"
          target="_blank"
          style="
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(106, 56, 194, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
          "
        >
          <div
            class="community-icon"
            style="background: rgba(37, 211, 102, 0.1); color: #25d366"
          >
            <i class="ri-whatsapp-fill"></i>
          </div>
          <h3 style="color: #333; margin: 0.5rem 0">WhatsApp</h3>
          <p
            style="
              color: #666;
              font-size: 0.9rem;
              margin-bottom: 1rem;
              flex-grow: 1;
            "
          >
            Direct updates
          </p>
          <span
            class="join-btn"
            style="
              background: #6a38c2;
              color: white;
              padding: 8px 16px;
              border-radius: 20px;
              font-size: 0.9rem;
              margin-top: auto;
            "
            >Join Chat</span
          >
        </a>

        <!-- Reddit Card -->
        <a
          href="[YOUR_REDDIT_LINK]"
          class="community-card"
          target="_blank"
          style="
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(106, 56, 194, 0.1);
          "
        >
          <div
            class="community-icon"
            style="background: rgba(255, 69, 0, 0.1); color: #ff4500"
          >
            <i class="ri-reddit-fill"></i>
          </div>
          <h3 style="color: #333; margin: 0.5rem 0">Reddit</h3>
          <p style="color: #666; font-size: 0.9rem; margin-bottom: 1rem">
            Discussions
          </p>
          <span
            class="join-btn"
            style="
              background: #6a38c2;
              color: white;
              padding: 8px 16px;
              border-radius: 20px;
              font-size: 0.9rem;
            "
            >Join Subreddit</span
          >
        </a>
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
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        // Animation trigger
        const observer = new IntersectionObserver(
          (entries) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting) {
                entry.target.style.animationPlayState = "running";
              }
            });
          },
          { threshold: 0.1 }
        );

        document
          .querySelectorAll(".testimonial-card, .stat-item")
          .forEach((el) => {
            observer.observe(el);
          });
      });
    </script>
  </body>
</html>
