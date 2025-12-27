<?php include('server.php');
if(isset($_SESSION["Username"])){
    $username=$_SESSION["Username"];
    if ($_SESSION["Usertype"]==1) {
        $linkPro="freelancerProfile.php";
        $linkEditPro="editFreelancer.php";
        $linkBtn="applyJob.php";
        $textBtn="Apply for this job";
    }
    else{
        $linkPro="employerProfile.php";
        $linkEditPro="editEmployer.php";
        $linkBtn="editJob.php";
        $textBtn="Edit the job offer";
    }
}
else{
    $username="";
    //header("location: index.php");
}

if(isset($_SESSION["msgRcv"])){
    $msgRcv=$_SESSION["msgRcv"];
}

if(isset($_POST["send"])){
    $msgTo=$_POST["msgTo"];
    $msgBody=$_POST["msgBody"];
    $sql = "INSERT INTO message (sender, receiver, msg) VALUES ('$username', '$msgTo', '$msgBody')";
    $result = $conn->query($sql);
    if($result==true){
        header("location: message.php");
    }
}




 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Send Message | Hypersphere</title>
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
    }

    /* Navbar */
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
    }

    .nav-link:hover {
        color: var(--primary) !important;
        transform: translateY(-1px);
    }

    /* Form Card */
    .form-card {
        background: var(--white);
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        padding: 2rem;
        margin-top: 2rem;
    }

    .form-control {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: var(--transition);
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.25rem rgba(106, 56, 194, 0.25);
    }

    /* Buttons */
    .btn-primary {
        background: var(--primary);
        border: none;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        border-radius: 8px;
        transition: var(--transition);
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    /* Typography */
    h2 {
        font-family: 'League Spartan', sans-serif;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        color: var(--text-medium);
        margin-bottom: 0.5rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .navbar-brand {
            font-size: 1.5rem;
        }
        
        .form-card {
            padding: 1.5rem;
            margin-top: 1rem;
        }
    }

        /* Footer */
        .footer {
        background: linear-gradient(135deg, #4a2a7a 0%, #2A1A4A 100%);
        color: var(--white);
        padding: 3rem 0 1rem;
    }

    .footer a {
        color: #b3b3b3;
        text-decoration: none;
        transition: var(--transition);
    }

    .footer a:hover {
        color: var(--white);
        transform: translateX(5px);
    }

    .social-icon {
        margin-right: 0.5rem;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .profile-img {
            width: 100px;
            height: 100px;
        }
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
.btn-primary {
    background: var(--primary-light);  /* Changed from gradient to light color */
    color: var(--primary);  /* Dark text for contrast */
    border: 1px solid var(--primary);
    /* Keep existing other properties */
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    border-radius: 8px;
    font-family: 'League Spartan', sans-serif;
    box-shadow: var(--box-shadow);
    transition: var(--transition);

}

.btn-primary:hover {
    background: var(--primary);
    color: var(--white);
    border-color: var(--primary);
}

/* Updated Button Styles */
.btn-outline-primary {
    color: var(--primary);
    border-color: var(--primary);
}

.btn-outline-primary:hover {
    background: var(--primary);
    color: var(--white);
    border-color: var(--primary);
}

/* Deposit Button */
.btn-sm.btn-outline-primary {
    color: var(--primary);
    border-color: var(--primary);
}

.btn-sm.btn-outline-primary:hover {
    background: var(--primary);
    color: var(--white);
}

/* Social Icons Hover */
.ri-facebook-fill,
.ri-google-fill,
.ri-twitter-x-fill,
.ri-linkedin-fill {
    transition: var(--transition);
}

.ri-facebook-fill:hover { color: #1877f2 !important; transform: scale(1.2); }
.ri-google-fill:hover { color: #db4437 !important; transform: scale(1.2); }
.ri-twitter-x-fill:hover { color: #000000 !important; transform: scale(1.2); }
.ri-linkedin-fill:hover { color: #0a66c2 !important; transform: scale(1.2); }
</style>

</head>
<body>

<!-- Updated Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">.hypersphere.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="allJob.php"><i class="ri-briefcase-line"></i> Browse Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="allFreelancer.php"><i class="ri-user-search-line"></i> Freelancers</a></li>
                <li class="nav-item"><a class="nav-link" href="allEmployer.php"><i class="ri-building-line"></i> Employers</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <i class="ri-user-line"></i> <?php echo $username; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?=$linkPro?>"><i class="ri-user-line"></i> View Profile</a></li>
                        <li><a class="dropdown-item" href="<?=$linkEditPro?>"><i class="ri-edit-line"></i> Edit Profile</a></li>
                        <li><a class="dropdown-item" href="message.php"><i class="ri-message-2-line"></i> Messages</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="ri-logout-box-line"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-card">
                <h2 class="mb-4"><i class="ri-chat-new-line"></i> Compose Message</h2>
                
                <form id="registrationForm" method="post">
                    <div class="mb-4">
                        <label class="form-label">Recipient</label>
                        <input type="text" class="form-control form-control-lg" 
                               name="msgTo" value="<?php echo $msgRcv; ?>">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="8" 
                                  name="msgBody" style="height: 200px;"></textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" name="send" class="btn btn-primary btn-lg">
                            <i class="ri-send-plane-fill"></i> Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Footer-->
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

<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>

<script>
$(document).ready(function() {
    $('#registrationForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            msgTo: {
                validators: {
                    notEmpty: {
                        message: 'This is required and cannot be empty'
                    }
                }
            },
            msgBody: {
                validators: {
                    notEmpty: {
                        message: 'This is required and cannot be empty'
                    }
                }
            }
            
        }
    });
});
</script>

</body>
</html>