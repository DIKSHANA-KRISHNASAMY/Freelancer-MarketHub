<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
	$username="";
	//header("location: index.php");
}

if(isset($_POST["jid"])){
	$_SESSION["job_id"]=$_POST["jid"];
	header("location: jobDetails.php");
}

if(isset($_POST["f_user"])){
	$_SESSION["f_user"]=$_POST["f_user"];
	header("location: viewFreelancer.php");
}


$sql = "SELECT * FROM employer WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name=$row["Name"];
        $email=$row["email"];
        $contactNo=$row["contact_no"];
        $gender=$row["gender"];
        $birthdate=$row["birthdate"];
        $address=$row["address"];
        $profile_sum=$row["profile_sum"];
        $company=$row["company"];
        }
} else {
    echo "0 results";
}

$sql = "SELECT * FROM job_offer WHERE e_username='$username' and valid=1 ORDER BY timestamp DESC";
$result = $conn->query($sql);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employer Profile | Hypersphere</title>
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

    .dropdown-menu {
        border: none;
        box-shadow: var(--box-shadow);
        border-radius: var(--border-radius);
    }

    /* Cards */
    .card {
        background: var(--white);
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        border: none;
        margin-bottom: 1.5rem;
        transition: var(--transition);
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.1);
    }

    /* Profile Section */
    .profile-header {
        text-align: center;
        padding: 2rem 0;
    }

    .profile-img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid var(--white);
        box-shadow: var(--box-shadow);
        margin-bottom: 1rem;
    }

    /* Panels */
    .panel {
        border-radius: var(--border-radius);
        margin-bottom: 1rem;
        border: none;
    }

    .panel-heading {
        background-color: var(--primary-light);
        color: var(--primary-dark);
        font-weight: 600;
        border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
        padding: 1rem;
    }

    .panel-body {
        padding: 1.5rem;
        background: var(--white);
        border-radius: 0 0 var(--border-radius) var(--border-radius);
    }

    .panel-heading h3 {
        /* Existing styles */
        font-size: 1.4rem; /* Reduced font size */
    }
    .panel-heading h4 {
        /* Existing styles */
        font-size: 1.4rem; /* Reduced font size */
    }



    /* Tables */
    .table {
        width: 100%;
    }

    .table tr {
        transition: var(--transition);
    }

    .table tr:hover {
        background-color: var(--primary-light);
    }

    .btn-link {
        color: var(--primary);
        font-weight: 500;
        text-decoration: none;
        transition: var(--transition);
    }

    .btn-link:hover {
        color: var(--primary-dark);
        transform: translateX(5px);
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

<!-- Main Content -->
<div class="container py-4">
    <div class="row g-4">
        <!-- Left Column -->
        <div class="col-lg-3">
            <!-- Profile Card -->
            <div class="card text-center p-4">
                <img src="image/img04.jpg" class="profile-img mx-auto">
                <h3 class="mb-3"><?php echo $name; ?></h3>
                <p class="text-muted mb-4"><i class="ri-user-line"></i> <?php echo $username; ?></p>
                
                <div class="d-grid gap-2">
                    <a href="postJob.php" class="btn btn-primary"><i class="ri-add-line"></i> Post a Job</a>
                    <a href="editEmployer.php" class="btn btn-outline-primary"><i class="ri-edit-line"></i> Edit Profile</a>
                    <a href="message.php" class="btn btn-outline-primary"><i class="ri-message-2-line"></i> Messages</a>
                </div>
            </div>

            <!-- Contact Card -->
            <div class="card">
                <div class="panel-heading"><h4><i class="ri-contacts-line"></i> Contact Information</h4></div>
                <div class="panel-body">
                    <p><i class="ri-mail-line"></i> <?php echo $email; ?></p>
                    <p><i class="ri-phone-line"></i> <?php echo $contactNo; ?></p>
                    <p><i class="ri-map-pin-line"></i> <?php echo $address; ?></p>
                </div>
            </div>

            <!-- Social Media Links -->
<!-- Social Links -->
<div class="card">
    <div class="panel-heading"><h4><i class="ri-share-line"></i> Social Networks</h4></div>
    <div class="panel-body">
        <div class="d-flex justify-content-around">
            <a href="#" class="text-decoration-none">
                <i class="ri-facebook-fill text-primary" style="font-size: 1.5rem;"></i>
            </a>
            <a href="#" class="text-decoration-none">
                <i class="ri-google-fill text-primary" style="font-size: 1.5rem;"></i>
            </a>
            <a href="#" class="text-decoration-none">
                <i class="ri-twitter-x-fill text-primary" style="font-size: 1.5rem;"></i>
            </a>
            <a href="#" class="text-decoration-none">
                <i class="ri-linkedin-fill text-primary" style="font-size: 1.5rem;"></i>
            </a>
        </div>
    </div>
</div>
        </div>

        <!-- Middle Column -->
        <div class="col-lg-6">
            <!-- Profile Details -->
            <div class="card">
                <div class="panel-heading"><h3><i class="ri-profile-line"></i> Employer Profile</h3></div>
                <div class="panel-body">
                    <h4 class="mb-3"><i class="ri-building-line"></i> <?php echo $company; ?></h4>
                    <p><?php echo $profile_sum; ?></p>
                </div>
            </div>

            <!-- Current Job Offers -->
            <div class="card">
                <div class="panel-heading"><h3><i class="ri-briefcase-line"></i> Current Job Offers</h3></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job ID</th>
                                    <th>Title</th>
                                    <th>Posted</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql = "SELECT * FROM job_offer WHERE e_username='$username' and valid=1 ORDER BY timestamp DESC";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '
                                        <form action="employerProfile.php" method="post">
                                        <input type="hidden" name="jid" value="'.$row["job_id"].'">
                                            <tr>
                                            <td>'.$row["job_id"].'</td>
                                            <td><button type="submit" class="btn btn-link p-0">'.$row["title"].'</button></td>
                                            <td>'.$row["timestamp"].'</td>
                                            </tr>
                                        </form>
                                        ';
                                    }
                                } else {
                                    echo '<tr><td colspan="3">No current job offers</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Previous Job Offers -->
            <div class="card">
                <div class="panel-heading"><h3><i class="ri-history-line"></i> Previous Job Offers</h3></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job ID</th>
                                    <th>Title</th>
                                    <th>Posted</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql = "SELECT * FROM job_offer WHERE e_username='$username' and valid=0 ORDER BY timestamp DESC";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '
                                        <form action="employerProfile.php" method="post">
                                        <input type="hidden" name="jid" value="'.$row["job_id"].'">
                                            <tr>
                                            <td>'.$row["job_id"].'</td>
                                            <td><button type="submit" class="btn btn-link p-0">'.$row["title"].'</button></td>
                                            <td>'.$row["timestamp"].'</td>
                                            </tr>
                                        </form>
                                        ';
                                    }
                                } else {
                                    echo '<tr><td colspan="3">No previous job offers</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-3">
            <!-- Current Hires -->
            <div class="card">
                <div class="panel-heading"><h4><i class="ri-user-star-line"></i> Current Hires</h4></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job</th>
                                    <th>Freelancer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.e_username='$username' AND selected.valid=1 ORDER BY job_offer.timestamp DESC";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '
                                        <form action="employerProfile.php" method="post">
                                        <input type="hidden" name="jid" value="'.$row["job_id"].'">
                                            <tr>
                                            <td><button type="submit" class="btn btn-link p-0">'.$row["title"].'</button></td>
                                            </form>
                                            <form action="employerProfile.php" method="post">
                                            <input type="hidden" name="f_user" value="'.$row["f_username"].'">
                                            <td><button type="submit" class="btn btn-link p-0">'.$row["f_username"].'</button></td>
                                            </tr>
                                        </form>
                                        ';
                                    }
                                } else {
                                    echo '<tr><td colspan="2">No current hires</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Previous Hires -->
            <div class="card">
                <div class="panel-heading"><h4><i class="ri-user-unfollow-line"></i> Previous Hires</h4></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job</th>
                                    <th>Freelancer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.e_username='$username' AND selected.valid=0 ORDER BY job_offer.timestamp DESC";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '
                                        <form action="employerProfile.php" method="post">
                                        <input type="hidden" name="jid" value="'.$row["job_id"].'">
                                            <tr>
                                            <td><button type="submit" class="btn btn-link p-0">'.$row["title"].'</button></td>
                                            </form>
                                            <form action="employerProfile.php" method="post">
                                            <input type="hidden" name="f_user" value="'.$row["f_username"].'">
                                            <td><button type="submit" class="btn btn-link p-0">'.$row["f_username"].'</button></td>
                                            </tr>
                                        </form>
                                        ';
                                    }
                                } else {
                                    echo '<tr><td colspan="2">No previous hires</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- WALLET -->
            <div class="card">
                <div class="panel-heading"><h4><i class="ri-wallet-3-line"></i> My Wallet</h4></div>
                <div class="panel-body">
                    <p>Balance: $0.00</p>
                    <p>Payment Method: None</p>
                    <button class="btn btn-sm btn-outline-primary w-100">Deposit</button>
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
<script src="jquery/jquery-3.2.1.min.js"></script>
</body>
</html>