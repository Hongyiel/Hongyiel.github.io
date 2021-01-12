<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION["loggedin"])){
    if ($_SESSION["loggedin"]){
        $user = $_SESSION["username"];
    }else{
        $user = '';
    }
}else{
    $user = '';
}


    // Include config file
    require_once "connectvars.php";

    $query = "SELECT Nick_name FROM THE_USER WHERE U_ID = '$user'";

    // Get results from query
    $result = mysqli_query($link, $query);
    if (!$result) {
        die("Query to show fields from table failed(Temporary)");
    }
    $row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<?php include 'header.php'; ?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <!-- <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style> -->
  </head>
  <body>
    <div class="page-header wrapper-inner">
      <h1>Hi, <b><?php echo htmlspecialchars($row['Nick_name']); ?></b>.<br>Welcome to our site!</h1>
      <p><a href="change-nickname.php" class="btn btn-warning">Change Your Nickname</a></p>
      <p><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a></p>
      <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
    </div>
  </body>
</html>
