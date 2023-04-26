<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['signup'])) {
        // call method addToCart
        $User->addToUser($_POST['uname'], $_POST['email'], $_POST['pswd']);
    }
}
?>
<main> <?php
        if (isset($_GET["error"])) {
            //show all possible error
            if ($_GET["error"] == "emptyfields") {
                echo '<p>Empty Field</p>';
            } elseif ($_GET["error"] == "invaliduidandemail") {
                echo '<p>Invalid User Name And password</p>';
            } elseif ($_GET["error"] == "invalidemail") {
                echo '<p>Invalid E-mail Id</p>';
            } elseif ($_GET["error"] == "invaliduname") {
                echo '<p>Invalid User Name</p>';
            } elseif ($_GET["error"] == "pwdcheck") {
                echo '<p>Password not mached</p>';
            } elseif ($_GET["error"] == "usertaken") {
                echo '<p>User Is Already Taken</p>';
            } elseif ($_GET["error"] == "sqlerror") {
                echo '<p>Sql Error</p>';
            } else {
                echo '<p>Error</p>';
            }
        } elseif (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
                echo '<div class="success"><p>Signup Successful</p></div>';
            }
        }
        ?>
    <div class="form">
        <!--signup form-->

        <form method="post">
            <div class="input"><input type="text" name="uname" required="required"><span>username</span></div>
            <div class="input"><input type="email" name="email" required="required"><span>e-mail</span></div>
            <div class="input"><input type="password" name="pswd" required="required"><span>password</span></div>
            <button type="submit" name="signup">Signup</button>
        </form>
    </div>
</main>