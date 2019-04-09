<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['loginemail'];
    $password = $_POST['loginPassword'];

    $conn = new mysqli($config->host, $config->username, $config->password, $config->database);
    $sql = "select ld.* from logincredentials as lc left join logincredentials as ld on (ld.userId = lc.userid) where ld.username='$username' and ld.password='$password'";
    $result = $conn->query($sql);

    if($conn->error)
        die("invalid user name or password");

    echo $username . ' ' . $password . " $sql";
    if(isset($result) && $result->num_rows)
        while ($row = $result->fetch_assoc()){
            $_SESSION[APP_USER_CREDENTIAL_AUTH] = $username;
            header("Location: main.php", true);
            return;
        }
}
?>

<!-- Login Form -->
<div class="login form-peice switched">
    <form class="login-form" method="post">
        <div class="form-heading">
            <h2>Sign In</h2>
        </div>
        <div class="form-group">
            <label for="loginemail">Email Adderss</label>
            <input type="text" name="loginemail" id="loginemail" required>
        </div>

        <div class="form-group">
            <label for="loginPassword">Password</label>
            <input type="password" name="loginPassword" id="loginPassword" required>
        </div>

        <div class="CTA">
            <input type="submit" value="Sign In">
            <a href="#" class="switch">I'm New User</a>
        </div>
    </form>
</div><!-- End Login Form -->