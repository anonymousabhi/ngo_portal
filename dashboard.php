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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">

    <!--     Custom styles for this template-->
    <link href="css/one-page-wonder.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!--    JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"></script>


    <!--Custom JS-->


</head>


<body>

<?php
session_start();
include 'api/fetch_ngo/get_ngo_script.php'; ?>

<!--Nav bar-->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo/logo.png" width="30" height="30" alt="">
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

                <li class="nav-item">
                    <a class="nav-link" href="api/logout.php">Logout</a>
                </li>


            </ul>
        </div>
    </div>
</nav>

<header class="masthead text-dark" id="signup-body">
    <div class="masthead-content row">
        <div class="container col-md-6">

            <?php $someArray = json_decode($result,true);
            foreach ($someArray as $key => $value) { ?>
                <div class="card mb-5 ngo_card">
                    <h4 class="card-header">
                        <?php echo $value["name"]; ?>
                    </h4>

                    <div class="card-body">
                    <div class="row">
                        <div class="card-title col-md-8 text-capitalize">
                            <?php echo $value["city"]; ?>,
                            <?php echo $value["state"]; ?>

                        </div>
                        <span class="text-right col-md-4">Fund Raised:₹ <?php echo $value["fund"]; ?> </span>
                    </div>

                    <form action="api/transaction/donate_script.php" method="POST">
                        <div class="row">
                            <div class="input-group col-md-5 mx-auto">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" name="ngo_id" value="<?php echo $value['ngo_id']; ?>">
                                    <input type="hidden" name="date" value="<?php $date = new DateTime();
                                    echo $date->format('Y-m-d H:i:s'); ?>">
                                    <input type="number" class="form-control" name="amount" aria-label="Dollar amount (with dot and two decimal places)" min="1" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">₹</span>
                                        <input type="submit" class="btn btn-primary" value="Donate" >
                                    </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <?php } ?>






        </div>
</header>


<!--Footer-->
<?php include_once 'parts/footer.php' ; ?>
<body>
<script>
    iziToast.success({
        title: 'Hey!',
        message: 'User Successfully logged in'
    });



</script>


</html>

