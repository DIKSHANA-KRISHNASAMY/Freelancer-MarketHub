<?php
include('server.php');

// Original server.php variables
$errorMsg = "";
$errorMsg2 = "";
$name = "";
$username = "";
$email = "";
$password = "";
$contactNo = "";
$birthdate = "";
$address = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hypersphere | Student Freelancing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        :root {
            --primary: #6A38C2;
            --primary-light: #8A63D2;
            --text: #2A2A3C;
            --text-light: #6E6E8A;
            --border: #E0E0EA;
            --bg: #F8F5FF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'League Spartan', sans-serif;
        }

        body {
            background: var(--bg);
            color: var(--text);
        }

        /* Navigation */
        .navbar {
            background: var(--primary);
            padding: 1rem 5%;
        }

        .navbar-brand {
            color: white !important;
            font-weight: 700;
            font-size: 1.5rem;
            text-decoration: none;
        }

        /* View Containers */
        .view-container {
            display: none;
            max-width: 1200px;
            margin: 2rem auto;
            padding: 20px;
        }

        .view-active {
            display: block;
        }

        /* View 1 - Role Selection */
        .role-selection {
            text-align: center;
            padding: 4rem 2rem;
        }

        .role-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            max-width: 800px;
            margin: 3rem auto;
        }

        .role-card {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .role-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
            box-shadow: 0 10px 30px rgba(106, 56, 194, 0.15);
        }

        .role-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .view-switch-link {
            text-align: center;
            margin-top: 2rem;
            color: var(--text-light);
        }

        .view-switch-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        /* Updated styles for View 1 */
.role-selection {
    text-align: center;
    padding: 6rem 2rem;
    background: var(--bg);
}

.auth-header {
    margin-bottom: 3rem;
}

.auth-header h2 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: var(--primary);
}

.auth-header p {
    font-size: 1.25rem;
    color: var(--text-light);
}

.role-cards {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 3rem;
    max-width: 900px;
    margin: 0 auto;
}

.role-card {
    background: white;
    padding: 3rem 2rem;
    border-radius: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.role-card:hover {
    transform: translateY(-5px);
    border-color: var(--primary);
    box-shadow: 0 10px 30px rgba(106, 56, 194, 0.15);
}

.role-icon {
    font-size: 3.5rem;
    color: var(--primary);
    margin-bottom: 1.5rem;
}

.role-card h3 {
    font-size: 1.75rem;
    margin-bottom: 1rem;
    color: var(--text);
}

.role-card p {
    font-size: 1.1rem;
    color: var(--text-light);
}

.view-switch-link {
    margin-top: 3rem;
    color: var(--text-light);
}

.view-switch-link a {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
}

.view-switch-link a:hover {
    text-decoration: underline;
}

        /* View 2 - Registration */
        .registration-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(106, 56, 194, 0.15);
            display: flex;
            min-height: 600px;
        }

        .carousel-side {
            flex: 1;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border-radius: 20px 0 0 20px;
            overflow: hidden;
            display: flex;
            align-items: center; /* Center align vertically */
            justify-content: center; /* Center align horizontally */
        }

        .form-side {
            flex: 1;
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .swiper-slide {
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .swiper-slide img {
            max-width: 250px;
            margin-bottom: 2rem;
        }

        .swiper-slide h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .form-header h1 {
            color: var(--text);
            margin-bottom: 0.5rem;
        }

        .role-indicator {
            color: var(--primary);
            font-weight: 600;
            display: block;
            margin-top: 1rem; /* Add margin to separate from "Create Account" text */
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text);
            font-weight: 600;
        }

        .form-input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(106, 56, 194, 0.1);
        }

        .gender-group {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .gender-option {
            flex: 1;
            text-align: center;
        }

        .gender-radio {
            display: none;
        }

        .gender-label {
            display: block;
            padding: 0.8rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gender-radio:checked + .gender-label {
            border-color: var(--primary);
            background: rgba(106, 56, 194, 0.1);
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background: var(--primary-light);
        }

        .error-msg {
            color: #dc3545;
            margin-bottom: 1rem;
            text-align: center;
        }

        /* View 3 - Login */
        .login-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(106, 56, 194, 0.15);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary);
            margin-bottom: 2rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .registration-container {
                flex-direction: column;
            }

            .carousel-side {
                border-radius: 20px 20px 0 0;
                padding: 2rem;
            }

            .role-cards {
                grid-template-columns: 1fr;
            }

            .form-side {
                padding: 2rem 1.5rem;
            }
        }
        /* Add these new styles */
    .registration-container {
        height: 720px; /* Fixed container height */
        max-width: 1200px;
    }

    .carousel-side,
    .form-side {
        flex: 1;
        min-height: 720px; /* Match container height */
    }

    .swiper-slide {
        height: 720px;
        padding: 4rem 2rem;
    }

    .swiper-slide img {
        max-width: 280px;
        margin-bottom: 2rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .registration-container {
            height: auto;
            flex-direction: column;
        }

        .carousel-side,
        .form-side {
            min-height: auto;
        }

        .swiper-slide {
            height: 400px;
            padding: 2rem;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
    }
    /* View 2 Specific Styles */
    .registration-view-container {
        display: flex;
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(106, 56, 194, 0.15);
        max-width: 1100px;
        margin: 1rem auto;
        min-height: 680px;
    }

    .registration-carousel {
        flex: 1;
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        border-radius: 20px 0 0 20px;
        overflow: hidden;
        display: flex;
        align-items: center; /* Center align vertically */
        justify-content: center; /* Center align horizontally */
    }

    .registration-carousel .swiper-slide {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        height: 680px;
        color: white;
        text-align: center;
    }

    .registration-carousel img {
        max-width: 280px;
        margin-bottom: 2rem;
    }

    .registration-form {
        flex: 1;
        padding: 2.5rem;
        position: relative;
        overflow-y: auto;
    }

    .form-back-link {
        position: absolute;
        top: 1.5rem;
        right: 2rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary) !important;
        cursor: pointer;
        background: rgba(240, 230, 245, 0.9) !important; /* Lighter purple tone */
        padding: 0.5rem 1rem;
        border-radius: 8px;
        border: 1px solid var(--border);
        transition: all 0.3s ease;
        z-index: 10;
    }

    .registration-form .form-header {
        margin-bottom: 2rem;
        text-align: center;
    }

    .registration-form .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .gender-options {
        display: flex;
        gap: 1rem;
        margin-top: 0.5rem;
    }

    .gender-option {
        flex: 1;
        text-align: center;
    }

    .gender-option input {
        display: none;
    }

    .gender-option label {
        display: block;
        padding: 0.8rem;
        border: 1px solid var(--border);
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .gender-option input:checked + label {
        border-color: var(--primary);
        background: rgba(106, 56, 194, 0.1);
    }

    @media (max-width: 768px) {
        .registration-view-container {
            flex-direction: column;
            min-height: auto;
        }

        .registration-carousel {
            height: 300px;
            border-radius: 20px 20px 0 0;
        }

        .registration-carousel .swiper-slide {
            height: 300px;
            padding: 1rem;
        }

        .registration-form .form-row {
            grid-template-columns: 1fr;
        }

        .form-back-link {
            top: 1rem;
            right: 1rem;
        }
    }
    .form-back-link {
    position: absolute;
    top: 1.5rem;
    right: 2rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary) !important;
    cursor: pointer;
    background: rgba(240, 230, 245, 0.9) !important; /* Lighter purple tone */
    padding: 0.5rem 1rem;
    border-radius: 8px;
    border: 1px solid var(--border);
    transition: all 0.3s ease;
    z-index: 10;
}
/* Updated Form Header Alignment */
.registration-form .form-header {
    text-align: left;
    margin: 3.5rem 0 2rem 0;
    position: relative;
}

/* Enhanced Back Link Positioning */
.form-back-link {
    position: absolute;
    top: 1.5rem;
    right: 2rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary) !important;
    cursor: pointer;
    background: rgba(240, 230, 245, 0.9) !important; /* Lighter purple tone */
    padding: 0.5rem 1rem;
    border-radius: 8px;
    border: 1px solid var(--border);
    transition: all 0.3s ease;
    z-index: 10;
}

.form-back-link:hover {
    background: white !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

/* Role Indicator Styling */
.role-indicator {
    color: var(--primary);
    font-weight: 600;
    font-size: 1.1rem;
    margin-top: 0.5rem;
    display: block;
}

/* Add relative positioning to form container */
.registration-form {
    position: relative;
    padding: 3.5rem 2.5rem 2rem;
}
    </style>
</head>
<body>

    <!-- View 1: Role Selection -->
<!-- View 1: Role Selection -->
<div id="view1" class="view-container view-active">
    <div class="role-selection">
        <div class="auth-header">
            <h2>Join Hypersphere</h2>
            <p>Select your role to get started</p>
        </div>

        <div class="role-cards">
            <div class="role-card" onclick="showRegistration('freelancer')">
                <i class="ri-user-star-line role-icon"></i>
                <h3>Freelancer</h3>
                <p>I want to offer my skills and work on projects</p>
            </div>

            <div class="role-card" onclick="showRegistration('employer')">
                <i class="ri-briefcase-line role-icon"></i>
                <h3>Employer</h3>
                <p>I want to hire talented students for projects</p>
            </div>
        </div>

        <div class="view-switch-link">
            Already have an account? <a href="javascript:showLogin()">Login here</a>
        </div>
    </div>
</div>

    <!-- View 2: Registration Form -->
    <div id="view2" class="view-container">
        <div class="registration-view-container">
        <div class="registration-carousel">
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://illustrations.popsy.co/white/student-with-diploma.svg" alt="Freelance">
                <h2>Build Your Portfolio</h2>
                <p>Gain real-world experience while completing your studies</p>
            </div>
            <div class="swiper-slide">
                <img src="https://illustrations.popsy.co/white/designer.svg" alt="Collaborate">
                <h2>Collaborate with Peers</h2>
                <p>Work on exciting projects and grow your professional network</p>
            </div>
            <div class="swiper-slide">
                <img src="https://illustrations.popsy.co/white/student-going-to-school.svg" alt="Learn and Earn">
                <h2>Learn While You Earn</h2>
                <p>Get paid for your skills and build confidence in your abilities through real jobs</p>
            </div>
            <div class="swiper-slide">
                <img src="https://illustrations.popsy.co/white/studying.svg" alt="Flexible Work">
                <h2>Work on Your Schedule</h2>
                <p>Take on projects that fit your academic life and personal commitments</p>
            </div>
            <div class="swiper-slide">
                <img src="https://illustrations.popsy.co/white/calculator.svg" alt="Showcase Skills">
                <h2>Showcase Your Talent</h2>
                <p>Create a standout profile and show potential clients what you’re capable of</p>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

            <div class="registration-form">
                <div class="form-header">
                    <h1>Create Account</h1>
                    <div class="role-indicator" id="roleTitle">as Freelancer</div>
                </div>

                <div class="form-back-link" onclick="showRoleSelection()">
                    <i class="ri-arrow-left-line"></i>
                    Back
                </div>

                <form id="registrationForm" method="post">
                    <input type="hidden" name="usertype" id="selectedRole">
                    <div class="error-msg"><?php echo $errorMsg2; ?></div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-input" name="name" value="<?php echo $name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-input" name="username" value="<?php echo $username; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-input" name="email" value="<?php echo $email; ?>" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-input" name="password" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-input" name="repassword" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" class="form-input" name="contactNo" value="<?php echo $contactNo; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Birthdate</label>
                            <input type="date" class="form-input" name="birthdate" value="<?php echo $birthdate; ?>" required placeholder="YYYY-MM-DD">
                        </div>
                    </div>

                    <div class="form-group">
    <label class="form-label">Gender</label>
    <div class="gender-options">
        <div class="gender-option">
            <input type="radio" name="gender" value="male" id="male" required>
            <label for="male">Male</label>
        </div>
        <div class="gender-option">
            <input type="radio" name="gender" value="female" id="female" required>
            <label for="female">Female</label>
        </div>
        <div class="gender-option">
            <input type="radio" name="gender" value="other" id="other" required>
            <label for="other">Other</label>
        </div>
    </div>
    <div id="genderError" style="color: #dc3545; font-size: 0.875rem; margin-top: 0.5rem; display: none;">
        Please select a gender
    </div>
</div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-input" name="address" value="<?php echo $address; ?>" required>
                    </div>

                    <button type="submit" name="register" class="submit-btn">Create Account</button>
                </form>
            </div>
        </div>
    </div>

    <!-- View 3: Login Form -->
    <div id="view3" class="view-container">
        <div class="login-container">
            <div class="back-link" onclick="showRoleSelection()">
                <i class="ri-arrow-left-line"></i>
                Back
            </div>

            <div class="form-header">
                <h1>Welcome Back</h1>
                <p>Continue your freelancing journey</p>
            </div>

            <form id="loginForm" method="post">
                <div class="error-msg"><?php echo $errorMsg; ?></div>

                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-input" name="username" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-input" name="password" required>
                </div>

                <div class="form-group">
                    <label class="form-label">User Type</label>
                    <div class="gender-group">
                        <div class="gender-option">
                            <input type="radio" name="usertype" value="freelancer" id="login-freelancer" class="gender-radio" required>
                            <label for="login-freelancer" class="gender-label">Freelancer</label>
                        </div>
                        <div class="gender-option">
                            <input type="radio" name="usertype" value="employer" id="login-employer" class="gender-radio">
                            <label for="login-employer" class="gender-label">Employer</label>
                        </div>
                    </div>
                </div>

                <button type="submit" name="login" class="submit-btn">Sign In</button>
            </form>

            <div class="view-switch-link" style="margin-top: 2rem;">
                Don't have an account? <a href="javascript:showRoleSelection()">Register here</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="jquery/jquery-3.2.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/bootstrapValidator.js"></script>
    <script>
        // Initialize Swiper
        new Swiper('.swiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
            },
        });

        // View Management
        function showRegistration(role) {
            document.getElementById('selectedRole').value = role;
            document.getElementById('roleTitle').textContent = `as ${role.charAt(0).toUpperCase() + role.slice(1)}`;
            switchView('view2');
        }

        function showRoleSelection() {
            switchView('view1');
        }

        function showLogin() {
            switchView('view3');
        }

        function switchView(targetView) {
            document.querySelectorAll('.view-container').forEach(view => {
                view.classList.remove('view-active');
            });
            document.getElementById(targetView).classList.add('view-active');
        }

        // Preserve form state on validation errors
        <?php if(isset($_POST['register'])): ?>
            switchView('view2');
        <?php elseif(isset($_POST['login'])): ?>
            switchView('view3');
        <?php endif; ?>

        // Original Bootstrap Validator Configuration
        $(document).ready(function() {
    $('#registrationForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    }
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The username can only consist of alphabetical and number'
                    },
                    different: {
                        field: 'password',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    },
                    callback: {
                        message: 'Only educational email IDs ending with .ac.in or .edu.in are allowed for freelancers',
                        callback: function(value, validator, $field) {
                            var usertype = $('input[name="usertype"]').val();
                            if (usertype === 'freelancer') {
                                var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(ac|edu)\.in$/;
                                return regex.test(value);
                            }
                            return true;
                        }
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    },
                    stringLength: {
                        min: 6,
                        message: 'The password must have at least 6 characters'
                    }
                }
            },
            repassword: {
                validators: {
                    notEmpty: {
                        message: 'The password confirmation is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password is not matched'
                    }
                }
            },
            contactNo: {
                validators: {
                    notEmpty: {
                        message: 'The contact number is required'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The number is not valid'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            birthdate: {
                validators: {
                    notEmpty: {
                        message: 'The date of birth is required'
                    },
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'The date of birth is not valid'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address is required'
                    }
                }
            },
            usertype: {
                validators: {
                    notEmpty: {
                        message: 'The usertype is required'
                    }
                }
            }
        }
    });

    $('#loginForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    }
                }
            },
            usertype: {
                validators: {
                    notEmpty: {
                        message: 'The usertype is required'
                    }
                }
            }
        }
    });
});

// Pure frontend validation for gender selection
document.getElementById('registrationForm').addEventListener('submit', function(e) {
    const genderSelected = document.querySelector('input[name="gender"]:checked');
    const genderError = document.getElementById('genderError');

    if (!genderSelected) {
        e.preventDefault(); // Stop form submission
        genderError.style.display = 'block';

        // Add visual feedback to all options
        document.querySelectorAll('.gender-option label').forEach(label => {
            label.style.borderColor = '#dc3545';
            label.style.boxShadow = '0 0 0 2px rgba(220, 53, 69, 0.25)';
        });
    } else {
        genderError.style.display = 'none';
    }
});

// Remove error state when any option is selected
document.querySelectorAll('input[name="gender"]').forEach(radio => {
    radio.addEventListener('change', function() {
        document.getElementById('genderError').style.display = 'none';
        document.querySelectorAll('.gender-option label').forEach(label => {
            label.style.borderColor = '';
            label.style.boxShadow = '';
        });
    });
});

    </script>
</body>
</html>
