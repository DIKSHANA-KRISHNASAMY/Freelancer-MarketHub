<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
    $username="";
	//header("location: index.php");
}

if(isset($_SESSION["c_letter"])){
	$c_letter=$_SESSION["c_letter"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cover Letter | Hypersphere</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #6a38c2;
            --primary-dark: #5a2caa;
            --primary-light: #f0e9ff;
            --text-dark: #1a1a1a;
            --text-medium: #4d4d4d;
            --text-light: #737373;
            --light-bg: #f8f9fa;
            --white: #ffffff;
            --border-radius: 12px;
            --box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-dark);
            line-height: 1.6;
            padding-top: 80px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .hero-section {
            background: linear-gradient(135deg, #6a38c2 0%, #8f4ec9 100%);
            color: var(--white);
            padding: 3rem 0;
            clip-path: ellipse(120% 100% at 50% 0%);
            margin-bottom: 4rem;
			text-align: center;
        }

        .card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: none;
            max-width: 700px;
            margin: 0 auto 4rem auto;
            padding: 2rem;
        }

        .cover-letter {
            background: var(--primary-light);
            border-radius: var(--border-radius);
            padding: 2rem;
            border-left: 4px solid var(--primary);

        }

        .navbar {
            background-color: var(--white);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-family: 'League Spartan', sans-serif;
            font-weight: 700;
            font-size: 1.75rem;
            color: var(--primary) !important;
            letter-spacing: -0.5px;
        }

        .nav-link {
            color: var(--text-medium) !important;
            font-weight: 500;
            padding: 0.5rem 1.25rem !important;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .nav-link:hover, .nav-link:focus {
            color: var(--primary) !important;
            transform: translateY(-1px);
        }

        .dropdown-menu {
            border: none;
            box-shadow: var(--box-shadow);
            border-radius: var(--border-radius);
            padding: 0.5rem 0;
            margin-top: 0.5rem;
        }

        .dropdown-item {
            padding: 0.5rem 1.5rem;
            color: var(--text-medium);
            font-weight: 500;
            transition: var(--transition);
        }

        .dropdown-item:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .footer {
            background: linear-gradient(135deg, #4a2a7a 0%, #2A1A4A 100%);
            color: var(--white);
            padding: 4rem 0 2rem;
            position: relative;
            overflow: hidden;
            margin-top: auto;
        }

        .footer::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 50%,
                rgba(106, 56, 194, 0.15) 0%,
                rgba(74, 42, 122, 0.25) 100%
            );
            pointer-events: none;
        }

        .footer h3 {
            font-family: 'League Spartan', sans-serif;
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
            color: var(--white);
        }

        .footer a {
            color: #b3b3b3;
            text-decoration: none;
            transition: var(--transition);
            display: block;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
        }

        .footer a:hover {
            color: var(--white);
            transform: translateX(4px);
        }

        .social-icon {
            font-size: 1.1rem;
            margin-right: 0.75rem;
            transition: var(--transition);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 2rem;
            margin-top: 3rem;
            text-align: center;
            color: #999;
            font-size: 0.9rem;
        }
		.cover-letter-message{
			font-size: 1.5rem;
		}
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><span style="font-weight: 700; color: #6A38C2;">.hypersphere.</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="allJob.php"><i class="ri-briefcase-line"></i> Browse Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="allFreelancer.php"><i class="ri-user-search-line"></i> Freelancers</a></li>
                <li class="nav-item"><a class="nav-link" href="allEmployer.php"><i class="ri-building-line"></i> Employers</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="ri-user-line me-1"></i> <?php echo $username; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="employerProfile.php"><i class="ri-user-line"></i> View Profile</a></li>
                        <li><a class="dropdown-item" href="editEmployer.php"><i class="ri-edit-line"></i> Edit Profile</a></li>
                        <li><a class="dropdown-item" href="message.php"><i class="ri-message-2-line"></i> Messages</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="ri-logout-box-line"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="page-header animate-fade">
            <h1><i class="ri-file-text-line"></i> Cover Letter</h1>
            <p>View the cover letter submitted by the freelancer</p>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container main-content">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="page-header mb-4">
                    <h2><i class="ri-file-text-line"></i> Cover Letter</h2>
                </div>
                <div class="cover-letter">
                    <p class="cover-letter-message"><?php echo nl2br($c_letter); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <h3>Quick Links</h3>
                <a href="index.php"><i class="ri-home-4-line social-icon"></i> Home</a>
                <a href="allJob.php"><i class="ri-briefcase-line social-icon"></i> Browse Jobs</a>
                <a href="allFreelancer.php"><i class="ri-user-search-line social-icon"></i> Freelancers</a>
                <a href="allEmployer.php"><i class="ri-building-line social-icon"></i> Employers</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>About Us</h3>
                <a href="#"><i class="ri-team-line social-icon"></i> Our Team</a>
                <a href="#"><i class="ri-information-line social-icon"></i> About Hypersphere</a>
                <a href="#"><i class="ri-git-repository-line social-icon"></i> GitHub</a>
                <a href="#"><i class="ri-history-line social-icon"></i> Version History</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Contact Us</h3>
                <a href="#"><i class="ri-map-pin-line social-icon"></i> BIT, Sathyamangalam</a>
                <a href="#"><i class="ri-mail-line social-icon"></i> teamhypersphere@gmail.com</a>
                <a href="#"><i class="ri-phone-line social-icon"></i> +91 8072445055</a>
                <a href="#"><i class="ri-customer-service-line social-icon"></i> Support Center</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3>Follow Us</h3>
                <a href="#"><i class="ri-facebook-box-fill social-icon"></i> Facebook</a>
                <a href="#"><i class="ri-twitter-x-line social-icon"></i> Twitter</a>
                <a href="#"><i class="ri-linkedin-box-fill social-icon"></i> LinkedIn</a>
                <a href="#"><i class="ri-instagram-line social-icon"></i> Instagram</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> Hypersphere. All rights reserved. | Designed with <i class="ri-heart-fill" style="color: #ff4d4f;"></i> by Team Hypersphere</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
