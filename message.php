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

$sql = "SELECT * FROM message WHERE receiver='$username' ORDER BY timestamp DESC";
$result = $conn->query($sql);
$f=0;

if(isset($_POST["sr"])){
	$t=$_POST["sr"];
	$sql = "SELECT * FROM freelancer WHERE username='$t'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$_SESSION["f_user"]=$t;
		header("location: viewFreelancer.php");
	} else {
	    $sql = "SELECT * FROM employer WHERE username='$t'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$_SESSION["e_user"]=$t;
			header("location: viewEmployer.php");
		}
	}
}

if(isset($_POST["s_inbox"])){
	$t=$_POST["s_inbox"];
	$sql = "SELECT * FROM message WHERE receiver='$username' and sender='$t' ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	$f=0;
}

if(isset($_POST["s_sm"])){
	$t=$_POST["s_sm"];
	$sql = "SELECT * FROM message WHERE sender='$username' and receiver='$t' ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	$f=1;
}

if(isset($_POST["inbox"])){
	$sql = "SELECT * FROM message WHERE receiver='$username' ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	$f=0;
}

if(isset($_POST["sm"])){
	$sql = "SELECT * FROM message WHERE sender='$username' ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	$f=1;
}

if(isset($_POST["rep"])){
	$_SESSION["msgRcv"]=$_POST["rep"];
	header("location: sendMessage.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Messages | Hypersphere</title>
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

        .hero-section {
            background: linear-gradient(135deg, #6a38c2 0%, #8f4ec9 100%);
            color: var(--white);
            padding: 3rem 0;
            clip-path: ellipse(120% 100% at 50% 0%);
            margin-bottom: 2rem;
			text-align: center;
        }

        .card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: none;
        }

        .table-hover tbody tr:hover {
            background-color: var(--primary-light);
        }

        .btn-link {
            color: var(--primary);
            font-weight: 500;
            transition: var(--transition);
        }

        .btn-link:hover {
            color: var(--primary-dark);
            text-decoration: none;
        }

        .search-card {
            background: var(--white);
            border-left: 4px solid var(--primary);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
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

		.btn-light-primary {
    background-color: var(--primary-light);
    color: var(--primary);
    border: 1px solid var(--primary-light);
    border-radius: var(--border-radius);
    transition: var(--transition);
    padding: 0.5rem 1rem;
}

.btn-light-primary:hover {
    background-color: var(--primary);
    color: var(--white);
    border-color: var(--primary);
}


.message-link {
    color: var(--primary);
    text-decoration: underline;
    word-break: break-all;
}
.message-link:hover {
    color: var(--primary-dark);
}
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

    .hero-section {
        background: linear-gradient(135deg, #6a38c2 0%, #8f4ec9 100%);
        color: var(--white);
        padding: 3rem 0;
        clip-path: ellipse(120% 100% at 50% 0%);
        margin-bottom: 2rem;
        text-align: center;
    }

    .card {
        background: var(--white);
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        border: none;
    }

    .table-hover tbody tr:hover {
        background-color: var(--primary-light);
    }

    .btn-link {
        color: var(--primary);
        font-weight: 500;
        transition: var(--transition);
    }

    .btn-link:hover {
        color: var(--primary-dark);
        text-decoration: none;
    }

    .search-card {
        background: var(--white);
        border-left: 4px solid var(--primary);
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
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

    .btn-light-primary {
        background-color: var(--primary-light);
        color: var(--primary);
        border: 1px solid var(--primary-light);
        border-radius: var(--border-radius);
        transition: var(--transition);
        padding: 0.5rem 1rem;
    }

    .btn-light-primary:hover {
        background-color: var(--primary);
        color: var(--white);
        border-color: var(--primary);
    }

    .message-link {
        color: var(--primary);
        text-decoration: underline;
        word-break: break-all;
    }
    .message-link:hover {
        color: var(--primary-dark);
    }

    /* Added CSS for Search Card */
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

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: var(--white);
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #e0a800;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(224, 168, 0, 0.3);
    }

    .btn-warning:focus {
        box-shadow: 0 0 0 0.2rem rgba(224, 168, 0, 0.5);
    }
        /* Custom styles for Inbox Messages button */
        .btn-custom-inbox {
            background-color: rgba(106, 56, 194, 0.1); /* 10% opacity of primary color */
            border-color: var(--primary);
            color: var(--primary);
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .btn-custom-inbox:hover {
        background-color: var(--primary); /* Solid primary color on hover */
        border-color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(196, 69, 42, 0.3);
        color: #FFFFFF;
    }

    .btn-custom-inbox:focus {
        box-shadow: 0 0 0 0.2rem rgba(196, 69, 42, 0.5);
    }

    /* Custom styles for Sent Messages button */
    .btn-custom-sent {
        background-color: rgba(106, 56, 194, 0.1); /* 10% opacity of primary color */
            border-color: var(--primary);
            color: var(--primary);
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .btn-custom-sent:hover {
        background-color: var(--primary); /* Solid primary color on hover */
        border-color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(196, 69, 42, 0.3);
        color: #FFFFFF;
    }

    .btn-custom-sent:focus {
        box-shadow: 0 0 0 0.2rem rgba(35, 196, 61, 0.5);
    }
</style>

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

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="page-header animate-fade">
            <h1><i class="ri-message-3-line"></i> Messages</h1>
            <p>Manage your messages and stay connected</p>
        </div>
    </div>
</div>

<!-- Main Content -->
<!-- Main Content -->
<div class="container main-content">
    <div class="row g-4">
        <!-- Messages List -->
        <div class="col-lg-9">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0"><i class="ri-mail-line"></i> All Messages</h3>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th><i class="ri-message-2-line"></i> Message</th>
                                <th><i class="ri-user-line"></i> Username</th>
                                <th><i class="ri-time-line"></i> Timestamp</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $sender=$row["sender"];
                                        $receiver=$row["receiver"];
                                        $msg=$row["msg"];
                                        $timestamp=$row["timestamp"];

                                        if ($f==0) {
                                            $sr=$sender;
                                        }else{
                                            $sr=$receiver;
                                        }

                                        echo '
                                        <tr>
                                        <td>'.preg_replace('/(https?:\/\/\S+)/', '<a href="$1" class="message-link" target="_self">$1</a>', $msg).'</td>
                                            <td>
                                                <form action="message.php" method="post">
                                                    <input type="hidden" name="sr" value="'.$sr.'">
                                                    <button type="submit" class="btn btn-link p-0">
                                                        '.$sr.'
                                                    </button>
                                                </form>
                                            </td>
                                            <td>'.$timestamp.'</td>
                                            <td>
                                                <form action="message.php" method="post">
                                                    <input type="hidden" name="rep" value="'.$sr.'">
                                                    <button type="submit" class="btn btn-light-primary">
                                                        Reply
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center py-4'><i class='ri-emotion-sad-line display-4 text-muted'></i><p class='mt-3 mb-0'>Nothing to show</p></td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Search Sidebar -->
<!-- Search Sidebar -->
<div class="col-lg-3">
    <div class="card search-card p-4">
        <h5 class="mb-3"><i class="ri-search-line"></i> Search Messages</h5>

        <form action="message.php" method="post" class="mb-4">
            <div class="form-group">
                <label class="form-label"><i class="ri-inbox-line"></i> Search Inbox</label>
                <input type="text" class="form-control" name="s_inbox">
                <button type="submit" class="btn btn-primary w-100 mt-2">
                    <i class="ri-search-2-line"></i> Search
                </button>
            </div>
        </form>

        <form action="message.php" method="post" class="mb-4">
            <div class="form-group">
                <label class="form-label"><i class="ri-send-plane-line"></i> Search Sent Messages</label>
                <input type="text" class="form-control" name="s_sm">
                <button type="submit" class="btn btn-primary w-100 mt-2">
                    <i class="ri-search-2-line"></i> Search
                </button>
            </div>
        </form>

        <form action="message.php" method="post" class="mb-4">
            <div class="form-group">
                <button type="submit" name="inbox" class="btn btn-custom-inbox w-100">
                    <i class="ri-inbox-line"></i> Inbox Messages
                </button>
            </div>
        </form>

        <form action="message.php" method="post">
            <div class="form-group">
                <button type="submit" name="sm" class="btn btn-custom-sent w-100">
                    <i class="ri-send-plane-line"></i> Sent Messages
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
