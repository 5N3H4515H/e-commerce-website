<?php
//for logout and upload files
if (isset($_SESSION['userId'])) {
    $sample = $User->getUser($_SESSION['userId']); // get the login user
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login'])) {
        // call method addToCart
        $User->login($_POST['uid'], $_POST['pswd']);
    }
}
?>
</div>
<?php
 if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
      echo '<p>enter your username and password</p>';
    }
    elseif ($_GET['error'] == "worngpassword") {
      echo '<p>Worng password</p>';
    }
    elseif ($_GET['error'] == "sqlerror1") {
      echo '<p>sql error</p>';
    }
} elseif (isset($_GET["login"])) {
    if ($_GET["login"] == "success") {
        echo '<div class="success"><p>Login Successful</p></div>';
        header("Location: /AQS/index.php");
    }
}
?>
<div class="form">
    <form method="post">
        <div class="input"><input type="text" name="uid" required="required"><span> username </span></div>
        <div class="input"><input type="password" name="pswd" required="required"><span> password </span></div>
        <button type="submit" name="login">Login</button>   
    </form>
    <button type="submit" name="signup" class="message"> <a href="signup.php">Signup</a> </button>
</div>
</div>