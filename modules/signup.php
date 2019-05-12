<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NGO PORTAL</title>

<!--    CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!--     Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<!--     Custom styles for this template-->
    <link href="../css/one-page-wonder.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

<!--    JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!--Custom JS-->
    <script src="../js/cities.js"></script>

</head>


<body>
<!--Nav bar-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/logo/logo.png" width="30" height="30" alt="">
                NGO PORTAL
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Top Contributors</a>
                    </li>


                    <li class="nav-item dropdown">
                        <div class="nav-link dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                            Login
                        </div>

                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                            <form class="px-4 py-3" action="api/login/login_script.php" method="POST">
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormPassword1">Password</label>
                                    <input type="password" class="form-control" name="password" id="exampleDropdownFormPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                        <label class="form-check-label" for="dropdownCheck">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="modules/signup.php">New around here? Sign up</a>
                            <a class="dropdown-item" href="#">Forgot password?</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead text-center text-white " id="signup-body">
        <div class="masthead-content">
            <div class="container">
                <form action="../api/sign_up/register.php" method="POST" class="signup_form">
                    <h1 class="signup_header">Sign Up</h1>

                    <div class="form__field row">
                        <div class="col col-md-6">Name</div>
                        <input id="full_name" type="text" name="name" class="col col-md-4 form__input"  required>
                    </div>

                    <div class="form__field row">
                        <div class="col col-md-6">Gender</div>
                        <select id ="gender" name="gender" class="col col-md-4" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form__field row">
                        <div class="col col-md-6">Address</div>

                        <select onchange="print_city('state', this.selectedIndex);" id="sts" name ="state" class="col col-md-2 form-control" required></select>
                        <select id ="state" name="city" class="col col-md-2 form-control" required></select>

                    </div>

                    <div class="form__field row">
                        <div class="col col-md-6">Occupation </div>
                        <input id="occupation" type="text" name="occupation" class="col col-md-4 form__input"  required>
                    </div>

                    <div class="form__field row">
                        <div class="col col-md-6">Mobile number</div>
                        <input id="mobile_no" type="tel" name="mobile" class="col col-md-4 form__input"  placeholder="" pattern="[0-9]{10}" maxlength="10" oninvalid="setCustomValidity('Please enter a valid 10 digit mobile number.')" oninput="setCustomValidity('')"  required>
                    </div>

                    <div class="form__field row">
                        <div class="col col-md-6">E-mail</div>
                        <input id="user_email" type="email" name="email" class="col col-md-4 form__input"  required>
                    </div>

                    <div class="form__field row">
                        <div class="col col-md-6">Create Password</div>
                        <input id="password" type="password" name="password" class="col col-md-4 form__input"  required>
                    </div>

                    <div class="form__field row">
                        <div class="col col-md-6">Are you a memeber of any NGO:</div>
                        <div class="col col-md-2">
                            Yes
                            <input type="radio" name="isMember" value="yes"   required>
                        </div>
                        <div class="col col-md-2">
                            No
                            <input type="radio" name="isMember" value="no"   required>
                        </div>

                    </div>

                    <div class="form__field row">
                        <div class="col col-md-6">Have you previously donated to any NGO:</div>
                        <div class="col col-md-2">
                            Yes
                            <input  type="radio" name="donated" value="yes"   required>
                        </div>
                        <div class="col col-md-2">
                            No
                            <input  type="radio" name="donated" value="no"   required>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-submission">
                            <input class="btn btn-primary" type="submit" value="Submit">
                            <input class="btn btn-primary" type="reset" value="Reset">
                        </div>

                    </div>


                </form>

            </div>
    </header>


<!--Footer-->
    <?php include_once '../parts/footer.php' ; ?>
<body>
<script language="javascript">
    print_state("sts");
</script>

</html>

