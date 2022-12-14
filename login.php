<?php
require_once 'define.php';
session_start();

if (isset($_SESSION['userID'])) {
  header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Đăng nhập</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="qanh.css">
  <!-- styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- fav and touch icons -->

</head>

<?php
require_once app_root . '/controller/loginAuthen.php';

if (isset($_POST['LoginAction'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $result = userCheckLogin($username, $password);
  if ($result) {
    $current_user = mysqli_fetch_assoc($result);
    $_SESSION['userID'] = $current_user['userID'];
    $_SESSION['user_name'] = $current_user['username'];
    $_SESSION['userRole']  = $current_user['userRole'];
    header("Location: index.php");
  } else {
    echo 'Invalid account, please try again';
  }
}

?>

<body>
  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="" method="post">
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0" style="font-size: 30px ;">LOGIN</p>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid username" name="username" required />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" name="password" required />
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="LoginAction" value="Log In">
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php" class="link-danger">Register</a></p>
            </div>

          </form>
        </div>
      </div>
    </div>

    <!-- Right -->

    <!-- Right -->

  </section>
</body>

</html>