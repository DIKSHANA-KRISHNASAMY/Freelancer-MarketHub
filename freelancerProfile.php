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

    if(isset($_POST["e_user"])){
        $_SESSION["e_user"]=$_POST["e_user"];
        header("location: viewEmployer.php");
    }

    // Default query to fetch all job offers
    $sql = "SELECT * FROM job_offer WHERE valid=1 ORDER BY timestamp DESC";
    $result = $conn->query($sql);

    // Search functionality
    if(isset($_POST["s_title"])){
        $t=$_POST["s_title"];
        $sql = "SELECT * FROM job_offer WHERE LOWER(title) LIKE LOWER('%$t%') and valid=1";
        $result = $conn->query($sql);
        if ($result === false) {
            echo "Error searching by title: " . $conn->error;
        }
    }

    if(isset($_POST["s_type"])){
        $t=$_POST["s_type"];
        $sql = "SELECT * FROM job_offer WHERE LOWER(type) LIKE LOWER('%$t%') and valid=1";
        $result = $conn->query($sql);
        if ($result === false) {
            echo "Error searching by type: " . $conn->error;
        }
    }

    if(isset($_POST["s_employer"])){
        $t=$_POST["s_employer"];
        $sql = "SELECT * FROM job_offer WHERE e_username='$t' and valid=1";
        $result = $conn->query($sql);
        if ($result === false) {
            echo "Error searching by employer: " . $conn->error;
        }
    }

    if(isset($_POST["s_id"])){
        $t=$_POST["s_id"];
        $sql = "SELECT * FROM job_offer WHERE job_id='$t' and valid=1";
        $result = $conn->query($sql);
        if ($result === false) {
            echo "Error searching by ID: " . $conn->error;
        }
    }

    if(isset($_POST["recentJob"])){
        $sql = "SELECT * FROM job_offer WHERE valid=1 ORDER BY timestamp DESC";
        $result = $conn->query($sql);
        if ($result === false) {
            echo "Error fetching recent jobs: " . $conn->error;
        }
    }

    if(isset($_POST["oldJob"])){
        $sql = "SELECT * FROM job_offer WHERE valid=1 ORDER BY timestamp ASC";
        $result = $conn->query($sql);
        if ($result === false) {
            echo "Error fetching older jobs: " . $conn->error;
        }
    }

    $sql = "SELECT * FROM freelancer WHERE username='$username'";
    $freelancer_result = $conn->query($sql);
    if ($freelancer_result->num_rows > 0) {
        // output data of each row
        while($row = $freelancer_result->fetch_assoc()) {
            $name=$row["Name"];
            $email=$row["email"];
            $contactNo=$row["contact_no"];
            $gender=$row["gender"];
            $birthdate=$row["birthdate"];
            $address=$row["address"];
            $prof_title=$row["prof_title"];
            $skills=$row["skills"];
            $profile_sum=$row["profile_sum"];
            $education=$row["education"];
            $experience=$row["experience"];
            }
    } else {
        echo "0 results";
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Freelancer Profile | Hypersphere</title>
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

        /* Button Styles */
    /* Primary Button */
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
        color: white;
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
        color: white;
    }

    .btn-primary:hover::after {
        left: 50%;
        top: 50%;
    }

    /* Info Button (for search buttons) */
    .btn-info {
        background: linear-gradient(135deg, #2bc0e4 0%, #1a81b8 100%);
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
        box-shadow: 0 4px 12px rgba(43, 192, 228, 0.2);
        color: white;
        margin-top: 1rem;
        width: 100%;
    }

    .btn-info::after {
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

    .btn-info:hover {
        background: linear-gradient(135deg, #1a81b8 0%, #2bc0e4 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(43, 192, 228, 0.3);
        color: white;
    }

    .btn-info:hover::after {
        left: 50%;
        top: 50%;
    }

    /* Warning Button */
    .btn-warning {
        background: linear-gradient(135deg, #ffb347 0%, #ff8c00 100%);
        border: none;
        color: white;
        padding: 1rem 2.5rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        border-radius: 8px;
        font-family: 'League Spartan', sans-serif;
        text-transform: uppercase;
        box-shadow: 0 4px 12px rgba(255, 140, 0, 0.2);
        width: 100%;
        margin-bottom: 1rem;
    }

    .btn-warning::after {
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

    .btn-warning:hover {
        background: linear-gradient(135deg, #ff8c00 0%, #ffb347 100%);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 140, 0, 0.3);
    }

    .btn-warning:hover::after {
        left: 50%;
        top: 50%;
    }

    /* Outline Primary Button */
    .btn-outline-primary {
        color: var(--primary);
        border: 2px solid var(--primary);
        background: transparent;
        padding: 1rem 2.5rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        border-radius: 8px;
        font-family: 'League Spartan', sans-serif;
        text-transform: uppercase;
    }

    .btn-outline-primary:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(106, 56, 194, 0.2);
    }

    /* Search Card */
    .search-card {
        background: var(--white);
        border-left: 4px solid var(--primary);
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        padding: 1.5rem;
        transition: var(--transition);
        margin-bottom: 1.5rem;
    }

    .search-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    }

    .search-card .form-group {
        margin-bottom: 1.5rem;
    }

    .search-card .form-control {
        border: 2px solid #ececf1;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: var(--transition);
    }

    .search-card .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(106, 56, 194, 0.1);
    }
    .btn-link {
        color: var(--primary);
        font-weight: 500;
        transition: var(--transition);
        position: relative;
        text-decoration: none;
    }

    .btn-link:hover {
        color: var(--primary-dark);
        transform: translateY(-1px);
    }
        /* Skill Tags */
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

    .panel-heading h3 {
        font-size : 1.4rem;
    }
    .panel-heading h4 {
        font-size : 1.4rem;
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
                            <li><a class="dropdown-item" href="freelancerProfile.php"><i class="ri-user-line"></i> View Profile</a></li>
                            <li><a class="dropdown-item" href="editFreelancer.php"><i class="ri-edit-line"></i> Edit Profile</a></li>
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
                    <a href="editFreelancer.php" class="btn btn-primary"><i class="ri-edit-line"></i> Edit Profile</a>
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

            <!-- Reputation Card -->
            <div class="card">
                <div class="panel-heading"><h4><i class="ri-star-line"></i> Reputation</h4></div>
                <div class="panel-body">
                    <p><i class="ri-feedback-line"></i> Reviews: Nothing to show</p>
                    <p><i class="ri-star-fill"></i> Ratings: Nothing to show</p>
                </div>
            </div>
        </div>

        <!-- Middle Column -->
        <div class="col-lg-6">
            <!-- Profile Details -->
            <div class="card">
                <div class="panel-heading"><h3><i class="ri-profile-line"></i> Freelancer Profile</h3></div>
                <div class="panel-body">
                    <h4 class="mb-3"><i class="ri-briefcase-line"></i> <?php echo $prof_title; ?></h4>

                    <div class="mb-4">
                        <h5><i class="ri-tools-line"></i> Skills</h5>
                        <div>
                            <?php
                            $skillsArray = explode(',', $skills);
                            foreach($skillsArray as $skill) {
                                echo '<span class="skill-tag">'.trim($skill).'</span>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5><i class="ri-file-text-line"></i> Profile Summary</h5>
                        <p><?php echo $profile_sum; ?></p>
                    </div>

                    <div class="mb-4">
                        <h5><i class="ri-graduation-cap-line"></i> Education</h5>
                        <p><?php echo $education; ?></p>
                    </div>

                    <div class="mb-4">
                        <h5><i class="ri-history-line"></i> Experience</h5>
                        <p><?php echo $experience; ?></p>
                    </div>
                </div>
            </div>

            <!-- Current Jobs -->
            <div class="card">
                <div class="panel-heading"><h3><i class="ri-briefcase-line"></i> Current Jobs</h3></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job ID</th>
                                    <th>Title</th>
                                    <th>Employer</th>
                                    <th>Posted</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.f_username='$username' AND selected.valid=1 ORDER BY job_offer.timestamp DESC";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '
                                        <form action="employerProfile.php" method="post">
                                        <input type="hidden" name="jid" value="'.$row["job_id"].'">
                                            <tr>
                                            <td>'.$row["job_id"].'</td>
                                            <td><button type="submit" class="btn btn-link p-0">'.$row["title"].'</button></td>
                                            </form>
                                            <form action="employerProfile.php" method="post">
                                            <input type="hidden" name="e_user" value="'.$row["e_username"].'">
                                            <td><button type="submit" class="btn btn-link p-0">'.$row["e_username"].'</button></td>
                                            <td>'.$row["timestamp"].'</td>
                                            </tr>
                                        </form>
                                        ';
                                    }
                                } else {
                                    echo '<tr><td colspan="4">No current jobs</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Previous Works -->
            <div class="card">
                <div class="panel-heading"><h3><i class="ri-history-line"></i> Previous Works</h3></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Job ID</th>
                                    <th>Title</th>
                                    <th>Employer</th>
                                    <th>Posted</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.f_username='$username' AND selected.valid=0 ORDER BY job_offer.timestamp DESC";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '
                                        <form action="freelancerProfile.php" method="post">
                                        <input type="hidden" name="jid" value="'.$row["job_id"].'">
                                            <tr>
                                            <td>'.$row["job_id"].'</td>
                                            <td><button type="submit" class="btn btn-link p-0">'.$row["title"].'</button></td>
                                            </form>
                                            <form action="freelancerProfile.php" method="post">
                                            <input type="hidden" name="e_user" value="'.$row["e_username"].'">
                                            <td><button type="submit" class="btn btn-link p-0">'.$row["e_username"].'</button></td>
                                            <td>'.$row["timestamp"].'</td>
                                            </tr>
                                        </form>
                                        ';
                                    }
                                } else {
                                    echo '<tr><td colspan="4">No previous works</td></tr>';
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
            <!-- Wallet Card -->
            <div class="card">
                <div class="panel-heading"><h4><i class="ri-wallet-3-line"></i> My Wallet</h4></div>
                <div class="panel-body">
                    <p><i class="ri-money-dollar-circle-line"></i> Balance: $0.0</p>
                    <p><i class="ri-time-line"></i> Hourly Rate: $3.0</p>
                    <p><i class="ri-bank-card-line"></i> Payment Method: None</p>
                    <button class="btn btn-sm btn-outline-primary w-100">Withdraw</button>
                </div>
            </div>

            <!-- Social Networks -->
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
