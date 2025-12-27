<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
    $username="";
	//header("location: index.php");
}

if(isset($_SESSION["job_id"])){
    $job_id=$_SESSION["job_id"];
}
else{
    $job_id="";
    //header("location: index.php");
}


$sql = "SELECT * FROM job_offer WHERE job_id='$job_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title=$row["title"];
        $type=$row["type"];
        $description=$row["description"];
        $budget=$row["budget"];
        $skills=$row["skills"];
        $special_skill=$row["special_skill"];
        }
} else {
    echo "0 results";
}


if(isset($_POST["editJob"])){
    $title=test_input($_POST["title"]);
    $type=test_input($_POST["type"]);
    $description=test_input($_POST["description"]);
    $budget=test_input($_POST["budget"]);
    $skills=test_input($_POST["skills"]);
    $special_skill=test_input($_POST["special_skill"]);


    $sql = "UPDATE job_offer SET title='$title',type='$type',description='$description', budget='$budget', skills='$skills', special_skill='$special_skill', e_username='$username', valid=1 WHERE job_id='$job_id'";

    
    $result = $conn->query($sql);
    if($result==true){
        header("location: jobDetails.php");
    }
}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Job Offer | Hypersphere</title>
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

    .edit-job-hero {
        position: relative;
        overflow: hidden;
        clip-path: ellipse(120% 100% at 50% 0%);
        padding: 4rem 0 6rem;
        margin-bottom: 2rem;
        background: linear-gradient(135deg, #6a38c2 0%, #8f4ec9 100%);
        color: var(--white);
    }

    .wave-container {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100px;
        overflow: hidden;
        z-index: 1;
    }

    .wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 200%;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="%236a38c2" opacity=".25"/><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" fill="%236a38c2" opacity=".5"/><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%236a38c2"/></svg>');
        background-size: 50% 100%;
        animation: wave 7s linear infinite;
    }

    .form-container {
        background: var(--white);
        border-radius: var(--border-radius);
        padding: 3rem;
        box-shadow: var(--box-shadow);
        margin-bottom: 3rem;
    }

    .form-label {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border: none;
        padding: 0.75rem 2rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        border-radius: 8px;
        font-family: 'League Spartan', sans-serif;
        text-transform: uppercase;
        box-shadow: 0 4px 12px rgba(106, 56, 194, 0.2);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(106, 56, 194, 0.3);
    }

    .skill-tag {
        display: inline-block;
        background-color: var(--primary-light);
        color: var(--primary-dark);
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        margin: 0.25rem;
        font-size: 0.85rem;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .edit-job-hero {
            clip-path: ellipse(150% 100% at 50% 0%);
            padding-bottom: 4rem;
        }
        .wave-container {
            height: 60px;
        }
        .form-container {
            padding: 2rem;
        }
    }

    @keyframes wave {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .footer {
        background: linear-gradient(135deg, #4a2a7a 0%, #2A1A4A 100%);
        color: var(--white);
        padding: 4rem 0 2rem;
    }

    .footer h3 {
        font-family: 'League Spartan', sans-serif;
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        font-weight: 600;
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
    }

    .footer-bottom {
        border-top: 1px solid rgba(255,255,255,0.1);
        padding-top: 2rem;
        margin-top: 3rem;
        text-align: center;
        color: #999;
        font-size: 0.9rem;
    }

    
</style>
</head>
<body>

<!-- Navbar -->
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="ri-user-line"></i> <?php echo $username; ?>
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
<div class="edit-job-hero">
    <div class="container">
        <div class="page-header text-center">
            <h1><i class="ri-edit-box-line"></i> Edit Job Offer</h1>
            <p class="lead">Update your job listing to attract the best talent</p>
        </div>
    </div>
    <div class="wave-container">
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
    </div>
</div>

<!-- Job Edit Form -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-container">
                <form id="registrationForm" method="post" class="row g-4">
                    <!-- Job Information -->
                    <div class="col-12">
                        <h4 class="mb-4"><i class="ri-briefcase-line"></i> Job Details</h4>
                        
                        <div class="mb-3">
                            <label class="form-label"><i class="ri-pencil-line"></i> Job Title</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="ri-list-check"></i> Job Type</label>
                            <input type="text" class="form-control" name="type" value="<?php echo $type; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="ri-file-text-line"></i> Job Description</label>
                            <textarea class="form-control" name="description" rows="4" required><?php echo $description; ?></textarea>
                        </div>
                    </div>

                    <!-- Requirements & Budget -->
                    <div class="col-md-6">
                        <h4 class="mb-4"><i class="ri-tools-line"></i> Requirements</h4>

                        <div class="mb-3">
                            <label class="form-label"><i class="ri-money-dollar-circle-line"></i> Budget</label>
                            <input type="text" class="form-control" name="budget" value="<?php echo $budget; ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4 class="mb-4"><i class="ri-star-line"></i> Skills Needed</h4>

                        <div class="mb-3">
                            <label class="form-label"><i class="ri-tools-line"></i> Required Skills</label>
                            <input type="text" class="form-control" name="skills" value="<?php echo $skills; ?>" required>
                            <small class="text-muted">Separate skills with commas</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="ri-medal-line"></i> Special Requirement</label>
                            <input type="text" class="form-control" name="special_skill" value="<?php echo $special_skill; ?>">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 text-center mt-4">
                        <button type="submit" name="editJob" class="btn btn-primary px-5">
                            <i class="ri-save-line"></i> Update Job
                        </button>
                    </div>
                </form>
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
                <a href="#"><i class="ri-map-pin-line social-icon"></i> Chittagong University</a>
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