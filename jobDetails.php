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

if(isset($_SESSION["job_id"])){
    $job_id=$_SESSION["job_id"];
}
else{
    $job_id="";
    //header("location: index.php");
}

if(isset($_POST["f_user"])){
	$_SESSION["f_user"]=$_POST["f_user"];
	header("location: viewFreelancer.php");
}

if(isset($_POST["c_letter"])){
	$_SESSION["c_letter"]=$_POST["c_letter"];
	header("location: coverLetter.php");
}

if(isset($_POST["f_hire"])){
	$f_hire=$_POST["f_hire"];
	$f_price=$_POST["f_price"];
	$sql = "INSERT INTO selected (f_username, job_id, e_username, price, valid) VALUES ('$f_hire', '$job_id', '$username','$f_price',1)";

    $result = $conn->query($sql);
    if($result==true){
    	$sql = "DELETE FROM apply WHERE job_id='$job_id'";
		$result = $conn->query($sql);
		if($result==true){
			$sql = "UPDATE job_offer SET valid=0 WHERE job_id='$job_id'";
			$result = $conn->query($sql);
			if($result==true){
				header("location: jobDetails.php");
			}
		}
    }
}

if(isset($_POST["f_done"])){
	$f_done=$_POST["f_done"];
	$sql = "UPDATE selected SET valid=0 WHERE job_id='$job_id'";
	$result = $conn->query($sql);
    if($result==true){
    	header("location: jobDetails.php");
    }
}

$sql = "SELECT * FROM job_offer WHERE job_id='$job_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$e_username=$row["e_username"];
        $title=$row["title"];
        $type=$row["type"];
        $description=$row["description"];
        $budget=$row["budget"];
        $skills=$row["skills"];
        $special_skill=$row["special_skill"];
        $timestamp=$row["timestamp"];
        $jv=$row["valid"];
        $deadline=$row["deadline"];
        }
} else {
    echo "0 results";
}

$_SESSION["msgRcv"]=$e_username;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Job Details | Hypersphere</title>
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
            font-size: 1.4rem;
        }

        .panel-heading h4 {
            font-size: 1.4rem;
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
            background: var(--primary-light);
            color: var(--primary);
            border: 1px solid var(--primary);
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

        .job-offer-card {
            padding: 2rem;
        }

        .job-detail-box {
            border: 1.5px solid var(--primary);
            padding: 1.5rem;
            border-radius: var(--border-radius);
            background-color: var(--primary-light);
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            margin-bottom: 1.5rem; /* Added margin for spacing between divs */
        }

        .job-detail-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.1);
        }

        .job-detail-box h4 {
            font-size: 1.2rem;
            color: var(--primary);
        }

        .job-detail-box p {
            font-size: 1rem;
            color: var(--text-medium);
        }

		.card.job-offer-card .job-detail-box {
    border: 1.5px solid var(--primary);
    padding: 1.5rem;
    border-radius: var(--border-radius);
    background-color: var(--primary-light);
    box-shadow: var(--box-shadow);
    transition: var(--transition);
    margin-bottom: 1.5rem; /* Added margin for spacing between divs */
}

.card.job-offer-card .job-detail-box:last-child {
    margin-bottom: 0; /* Remove margin for the last child */
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
                        <li><a class="dropdown-item" href="<?php echo $linkPro; ?>"><i class="ri-user-line"></i> View Profile</a></li>
                        <li><a class="dropdown-item" href="<?php echo $linkEditPro; ?>"><i class="ri-edit-line"></i> Edit Profile</a></li>
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
        <div class="col-lg-8">
            <!-- Job Offer Details -->
            <div class="card job-offer-card">
                <div class="panel-heading">
                    <h3><i class="ri-briefcase-line"></i> Job Offer Details</h3>
                </div>
                <div class="panel-body">
                    <div class="row gx-4">
					<div class="col-md-6 job-detail-box mb-4" style="margin-bottom: 1.5rem;">
    <h4 class="mb-2"><i class="ri-text"></i> Job Title</h4>
    <p class="lead"><?php echo $title; ?></p>
</div>

                        <div class="col-md-6 job-detail-box mb-4">
                            <h4 class="mb-2"><i class="ri-file-list-3-line"></i> Job Type</h4>
                            <p><?php echo $type; ?></p>
                        </div>
                        <div class="col-md-6 job-detail-box mb-4">
                            <h4 class="mb-2"><i class="ri-money-dollar-circle-line"></i> Budget</h4>
                            <p><?php echo $budget; ?></p>
                        </div>
                        <div class="col-md-6 job-detail-box mb-4">
                            <h4 class="mb-2"><i class="ri-calendar-line"></i> Deadline</h4>
                            <p><?php echo $deadline; ?></p>
                        </div>
                        <div class="col-md-12 job-detail-box mb-4">
                            <h4 class="mb-2"><i class="ri-file-text-line"></i> Job Description</h4>
                            <p><?php echo $description; ?></p>
                        </div>
                        <div class="col-md-6 job-detail-box mb-4">
                            <h4 class="mb-2"><i class="ri-tools-line"></i> Required Skills</h4>
                            <p><?php echo $skills; ?></p>
                        </div>
                        <div class="col-md-6 job-detail-box mb-4">
                            <h4 class="mb-2"><i class="ri-star-line"></i> Special Requirement</h4>
                            <p><?php echo $special_skill; ?></p>
                        </div>
                    </div>
                    <a href="<?php echo $linkBtn; ?>" id="applybtn" type="button" class="btn btn-primary"><i class="ri-add-line"></i> <?php echo $textBtn; ?></a>
                </div>
            </div>

            <!-- Applicants for this job -->
            <div id="applicant" class="card mt-4">
                <div class="panel-heading"><h3><i class="ri-user-line"></i> Applicants for this job</h3></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Applicant's username</th>
                                    <th>Bid</th>
                                    <th>Cover Letter</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM apply WHERE job_id='$job_id' ORDER BY bid";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $f_username=$row["f_username"];
                                        $bid=$row["bid"];
                                        $cover_letter=$row["cover_letter"];

                                        echo '
                                        <form action="jobDetails.php" method="post">
                                        <input type="hidden" name="f_user" value="'.$f_username.'">
                                            <tr>
                                            <td><button type="submit" class="btn btn-link p-0">'.$f_username.'</button></td>
                                            <td>'.$bid.'</td>
                                            </form>
                                            <form action="jobDetails.php" method="post">
                                            <input type="hidden" name="c_letter" value="'.$cover_letter.'">
                                            <td><button type="submit" class="btn btn-link p-0">Cover Letter</button></td>
                                            </form>
                                            <form action="jobDetails.php" method="post">
                                            <input type="hidden" name="f_hire" value="'.$f_username.'">
                                            <input type="hidden" name="f_price" value="'.$bid.'">
                                            <td><button type="submit" class="btn btn-link p-0">Hire</button></td>
                                            </tr>
                                        </form>';
                                    }
                                } else {
                                    $sql = "SELECT * FROM selected WHERE job_id='$job_id'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            $f_username=$row["f_username"];
                                            $bid=$row["price"];
                                            $v=$row["valid"];

                                            if ($v==0) {
                                                $tc="Job ended";
                                                $tv="";
                                            }else{
                                                $tc="End Job";
                                                $tv="f_done";
                                            }

                                            echo '
                                            <form action="jobDetails.php" method="post">
                                            <input type="hidden" name="f_user" value="'.$f_username.'">
                                                <tr>
                                                <td><button type="submit" class="btn btn-link p-0">'.$f_username.'</button></td>
                                                <td>'.$bid.'</td>
                                                </form>
                                                <form action="jobDetails.php" method="post">
                                                <input type="hidden" name="'.$tv.'" value="'.$f_username.'">
                                                <td><button type="submit" class="btn btn-link p-0">'.$tc.'</button></td>
                                                </tr>
                                            </form>
                                            ';
                                        }
                                    } else {
                                        echo "<tr><td colspan='4'>Nothing to show</td></tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-4">
            <?php
            $sql = "SELECT * FROM employer WHERE username='$e_username'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $e_Name=$row["Name"];
                    $email=$row["email"];
                    $contact_no=$row["contact_no"];
                    $address=$row["address"];
                }
            } else {
                echo "0 results";
            }
            ?>

            <!-- Employer Profile Card -->
            <div class="card text-center p-4">
                <img src="image/img04.jpg" class="profile-img mx-auto">
                <h3 class="mb-3"><?php echo $e_Name; ?></h3>
                <p class="text-muted mb-4"><i class="ri-user-line"></i> <?php echo $e_username; ?></p>
                <div class="d-grid gap-2">
                    <a href="sendMessage.php" class="btn btn-primary"><i class="ri-message-2-line"></i> Send Message</a>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card mt-4">
                <div class="panel-heading"><h4><i class="ri-contacts-line"></i> Contact Information</h4></div>
                <div class="panel-body">
                    <p><i class="ri-mail-line"></i> <?php echo $email; ?></p>
                    <p><i class="ri-phone-line"></i> <?php echo $contact_no; ?></p>
                    <p><i class="ri-map-pin-line"></i> <?php echo $address; ?></p>
                </div>
            </div>

            <!-- Reputation -->
            <div class="card mt-4">
                <div class="panel-heading"><h4><i class="ri-star-line"></i> Reputation</h4></div>
                <div class="panel-body">
                    <div class="mb-3">
                        <h4 class="mb-1">Reviews</h4>
                        <p>Nothing to show</p>
                    </div>
                    <div class="mb-3">
                        <h4 class="mb-1">Ratings</h4>
                        <p>Nothing to show</p>
                    </div>
                </div>
            </div>

            <!-- Related Jobs -->
            <div class="card mt-4">
                <div class="panel-heading"><h4><i class="ri-briefcase-line"></i> Related Job Offers</h4></div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">Related job 1</li>
                        <li class="list-group-item">Related job 2</li>
                        <li class="list-group-item">Related job 3</li>
                        <li class="list-group-item">Related job 4</li>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="jquery/jquery-3.2.1.min.js"></script>

<?php
if($e_username!=$username && $_SESSION["Usertype"]!=1){
    echo "<script>
            $('#applybtn').hide();
        </script>";
}

if($_SESSION["Usertype"]==1 && $jv==0){
    echo "<script>
            $('#applybtn').hide();
        </script>";
}

if($e_username!=$username){
    echo "<script>
            $('#applicant').hide();
        </script>";
}
?>

</body>
</html>
