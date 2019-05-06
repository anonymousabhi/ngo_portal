<html>
<head>
<?php include_once 'head.php'; ?>
</head>
<body>

<?php include_once 'nav.php'; ?>

<section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <a class="nav-link" href="welcome.php"><h2 class="display-4">login</h2></a>
          </div>
        </div>
      </div>
    </div>
  </section>



<form action="action_page.php">
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
  <!-- Footer -->
  <?php include_once 'footer.php' ; ?>

<body>

</html>

