<?php include('server.php');
if(isset($_SESSION["Username"])){
    $username=$_SESSION["Username"];
}
else{
    $username="";
    //header("location: index.php");
}

if(isset($_POST["postJob"])){
    $title=test_input($_POST["title"]);
    $type=test_input($_POST["type"]);
    $description=test_input($_POST["description"]);
    $budget=test_input($_POST["budget"]);
    $skills=test_input($_POST["skills"]);
    $special_skill=test_input($_POST["special_skill"]);
    $deadline=test_input($_POST["deadline"]);

    $sql = "INSERT INTO job_offer (title, type, description, budget, skills, special_skill, e_username, valid, deadline) VALUES ('$title', '$type', '$description','$budget','$skills','$special_skill','$username',1, '$deadline')";
    
    $result = $conn->query($sql);
    if($result==true){
        $_SESSION["job_id"] = $conn->insert_id;
        header("location: jobDetails.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Post a job | Hypersphere</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/bootstrapValidator.css">
    
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
    }

    /* Enhanced Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #6a38c2 0%, #8f4ec9 100%);
        color: var(--white);
        padding: 4rem 0;
        clip-path: ellipse(120% 100% at 50% 0%);
        margin-bottom: 4rem;
    }

    .page-header {
        text-align: center;
        margin-bottom: 0;
    }

    .page-header h1 {
        font-family: 'League Spartan', sans-serif;
        font-weight: 700;
        font-size: 2.75rem;
        letter-spacing: -0.5px;
        margin-bottom: 1.5rem;
    }

    .page-header p {
        font-size: 1.15rem;
        opacity: 0.95;
        max-width: 800px;
        margin: 0 auto;
    }

    /* Enhanced Form Container */
    .form-image-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }

    .form-container {
        background: var(--white);
        border-radius: 16px;
        padding: 3rem;
        box-shadow: 0 12px 32px rgba(106, 56, 194, 0.1);
        position: relative;
        overflow: hidden;
    }

    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
    }

    /* Improved Form Elements */
    .form-label {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .form-control, .form-select {
        border: 2px solid #ececf1;
        border-radius: 10px;
        padding: 1rem 1.5rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(106, 56, 194, 0.1);
    }

    textarea.form-control {
        min-height: 150px;
    }

    .input-group-text {
        background: var(--primary-light);
        border: 2px solid #ececf1;
        border-right: none;
        font-weight: 500;
        padding: 0 1.25rem;
    }

    /* Enhanced Right Column */
    .right-image-column {
        background: linear-gradient(135deg, rgba(106, 56, 194, 0.98) 0%, rgba(143, 78, 201, 0.95) 100%);
        border-radius: 16px;
        padding: 2.5rem;
        position: relative;
        overflow: hidden;
    }

    .right-image-column::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
        transform: rotate(30deg);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin: 2rem 0;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(8px);
        border-radius: 12px;
        padding: 1.75rem;
        border: 1px solid rgba(255,255,255,0.15);
        transition: transform 0.3s ease;
        text-align: center;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.15);
    }

    .stat-card i {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        color: var(--white);
    }

    .stat-card h4 {
        font-family: 'League Spartan', sans-serif;
        margin: 0.5rem 0;
        font-weight: 700;
        color: var(--white);
    }

    .stat-card p {
        opacity: 0.8;
        font-size: 0.9rem;
        margin: 0;
        color: var(--white);
    }

    /* Enhanced Benefits List */
    .benefits-list {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        padding: 1.5rem;
        position: relative;
    }

    .benefits-list h5 {
        font-family: 'League Spartan', sans-serif;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--white);
    }

    .benefits-list ul {
        list-style: none;
        padding-left: 0;
    }

    .benefits-list li {
        padding: 0.75rem 0;
        position: relative;
        padding-left: 1.75rem;
        color: var(--white);
    }

    .benefits-list li::before {
        content: '';
        position: absolute;
        left: 0;
        top: 1.1rem;
        width: 8px;
        height: 8px;
        background: var(--white);
        border-radius: 50%;
    }

    /* Improved Button */
    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border: none;
        padding: 1rem 2.5rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        border-radius: 8px;
        font-family: 'League Spartan', sans-serif;
        text-transform: uppercase;
        box-shadow: 0 4px 12px rgba(106, 56, 194, 0.2);
    }

    .btn-primary::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: rgba(255,255,255,0.1);
        transform: rotate(45deg);
        transition: all 0.4s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(106, 56, 194, 0.3);
    }

    .btn-primary:hover::after {
        left: 50%;
        top: 50%;
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade {
        animation: fadeIn 0.6s ease-out forwards;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .form-image-container {
            grid-template-columns: 1fr;
        }

        .right-image-column {
            order: -1;
            min-height: 300px;
        }

        .form-container {
            padding: 2rem;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            clip-path: ellipse(150% 100% at 50% 0%);
            padding: 3rem 0;
        }

        .page-header h1 {
            font-size: 2rem;
        }

        .form-container {
            padding: 1.75rem;
        }

        .right-image-column {
            padding: 2rem;
        }
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

/* Original Footer Styling */
.footer {
    background: linear-gradient(135deg, #4a2a7a 0%, #2A1A4A 100%);
    color: var(--white);
    padding: 4rem 0 2rem;
    position: relative;
    overflow: hidden;
}

/* Optional: Add subtle texture overlay */
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

/* Carousel Styling */
.carousel {
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .illustration-card {
        padding: 2rem;
        height: 280px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 40px;
        height: 40px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        backdrop-filter: blur(4px);
        transition: var(--transition);
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background: rgba(255,255,255,0.3);
    }

    .carousel-indicators [data-bs-target] {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        border: none;
        background-color: rgba(255,255,255,0.4);
        margin: 0 4px;
    }

    .carousel-indicators .active {
        background-color: var(--white);
        width: 12px;
        border-radius: 6px;
    }

    @media (max-width: 768px) {
        .illustration-card {
            height: 200px;
            padding: 1rem;
        }
    }

    /* Add spacing between main content and footer */
    .container.main-content {
        margin-bottom: 4rem;
    }

    /* Adjust right column padding */
    .right-image-column {
        padding: 2.5rem 2.5rem 1.5rem;
    }

    /* Add breathing room for carousel */
    .carousel {
        margin-bottom: 2.5rem;
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
            <h1><i class="ri-rocket-line"></i> Post a New Job</h1>
            <p>Find the perfect freelancer for your project. Fill out the form below to get started.</p>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container main-content">
    <div class="form-image-container animate-fade" style="animation-delay: 0.2s;">
        <!-- Left Column (Form) -->
        <div class="form-container">
            <form id="registrationForm" method="post" class="row g-4">
                <div class="col-md-12">
                    <label for="title" class="form-label required"><i class="ri-pencil-line"></i>Job Title</label>
                    <input type="text" class="form-control" name="title" placeholder="e.g. Website Redesign for E-commerce Store" required>
                </div>

                <div class="col-md-12">
                    <label for="type" class="form-label required"><i class="ri-list-check"></i>Job Type</label>
                    <input type="text" class="form-control" name="type" placeholder="e.g. Web Development, Graphic Design" required>
                </div>

                <div class="col-md-12">
                    <label for="description" class="form-label required"><i class="ri-file-text-line"></i>Job Description</label>
                    <textarea class="form-control" name="description" rows="5" placeholder="Describe your project in detail including goals, requirements, and deliverables..." required></textarea>
                </div>

                <div class="col-md-6">
                    <label for="budget" class="form-label required"><i class="ri-money-dollar-circle-line"></i>Budget (₹)</label>
                    <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input type="text" class="form-control" name="budget" placeholder="e.g. 5000" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="deadline" class="form-label required"><i class="ri-calendar-line"></i>Deadline</label>
                    <input type="text" class="form-control" name="deadline" placeholder="YYYY-MM-DD" required>
                </div>

                <div class="col-md-12">
                    <label for="skills" class="form-label"><i class="ri-tools-line"></i>Required Skills</label>
                    <input type="text" class="form-control" name="skills" placeholder="e.g. HTML, CSS, JavaScript, Photoshop (separate with commas)">
                </div>

                <div class="col-md-12">
                    <label for="special_skill" class="form-label"><i class="ri-star-line"></i>Special Requirements</label>
                    <textarea class="form-control" name="special_skill" rows="3" placeholder="Any specific qualifications, timezone preferences, or special requirements"></textarea>
                </div>

                <div class="col-12 text-center mt-4">
                    <button type="submit" name="postJob" class="btn btn-primary px-5 py-3">
                        <i class="ri-send-plane-fill"></i> Post Job Now
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Column (Visuals) -->
        <div class="right-image-column">
    <div class="right-image-content">
        <!-- Carousel -->
        <div id="illustrationCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner rounded-lg">
                <div class="carousel-item active">
                    <div class="illustration-card">
                        <svg viewBox="0 0 600 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M300 200L150 350L450 350L300 200Z" fill="rgba(255,255,255,0.1)"/>
                            <circle cx="300" cy="200" r="80" fill="rgba(255,255,255,0.15)"/>
                            <path d="M100 100L500 300" stroke="white" stroke-width="2" stroke-opacity="0.2"/>
                        </svg>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="illustration-card">
                        <svg viewBox="0 0 600 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="200" y="150" width="200" height="200" rx="40" fill="rgba(255,255,255,0.1)"/>
                            <path d="M300 200L450 350L150 350L300 200Z" fill="rgba(255,255,255,0.15)"/>
                            <circle cx="300" cy="200" r="60" fill="rgba(255,255,255,0.1)"/>
                        </svg>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="illustration-card">
                        <svg viewBox="0 0 600 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M150 150L450 150L300 350L150 150Z" fill="rgba(255,255,255,0.1)"/>
                            <circle cx="300" cy="200" r="70" fill="rgba(255,255,255,0.15)"/>
                            <path d="M100 300L500 100" stroke="white" stroke-width="2" stroke-opacity="0.2"/>
                        </svg>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#illustrationCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#illustrationCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#illustrationCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#illustrationCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#illustrationCarousel" data-bs-slide-to="2"></button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid mb-4">
            <div class="stat-card">
                <i class="ri-user-3-line"></i>
                <h4>1.2K+</h4>
                <p>Active Freelancers</p>
            </div>
            <div class="stat-card">
                <i class="ri-briefcase-4-line"></i>
                <h4>95%</h4>
                <p>Project Success</p>
            </div>
            <!-- New Stat Cards -->
            <div class="stat-card">
                <i class="ri-time-line"></i>
                <h4>24h</h4>
                <p>Avg. Response Time</p>
            </div>
            <div class="stat-card">
                <i class="ri-heart-line"></i>
                <h4>98%</h4>
                <p>Client Satisfaction</p>
            </div>
        </div>

        <!-- Key Benefits -->
        <div class="benefits-list mt-4">
            <h5><i class="ri-checkbox-circle-fill"></i> Why Post Here?</h5>
            <ul>
                <li>Student-exclusive talent pool</li>
                <li>Fast 24-hour responses</li>
                <li>Secure escrow payments</li>
            </ul>
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

<style>
/* Original Footer Styling */
.footer {
    background-color: #1a1a1a;
    color: var(--white);
    padding: 4rem 0 2rem;
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

.stats-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="jquery/jquery-3.2.1.min.js"></script>
<script src="dist/js/bootstrapValidator.js"></script>

<script>
$(document).ready(function() {
    $('#registrationForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            title: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            type: {
                validators: {
                    notEmpty: {
                        message: 'The type is required and cannot be empty'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        message: 'The description is required and cannot be empty'
                    }
                }
            },
            deadline: {
                validators: {
                    notEmpty: {
                        message: 'The deadline is required'
                    },
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'The deadline is not valid'
                    }
                }
            },
            budget: {
                validators: {
                    notEmpty: {
                        message: 'The budget is required and cannot be empty'
                    },
                    stringLength: {
                        max: 11,
                        message: 'The number is too big'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The number is not valid'
                    }
                }
            }
        }
    });
});
</script>

</body>
</html>