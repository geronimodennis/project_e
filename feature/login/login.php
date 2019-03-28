<?php
include_once ("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli($config->host, $config->username, $config->password, $config->database);
    $sql = "select ld.* from logincredentials as lc left join logincredentials as ld on (ld.userId = lc.userid) where ld.username='$username' and ld.password='$password'";
    $result = $conn->query($sql);

    if($conn->error)
        die("invalid user name or password");

    echo $username . ' ' . $password . " $sql";
    if(isset($result) && $result->num_rows)
            while ($row = $result->fetch_assoc()){
            $_SESSION[APP_USER_CREDENTIAL_AUTH] = $username;
            header("Location: index.php", true);
            return;
        }
}
?>


<div class="col-md-4">
    <h3>LOG IN</h3>
    <form method="post">
        <div class="form-group">
            <input name="username" type="text" class="form-control" placeholder="Your Email *" value="" />
        </div>
        <div class="form-group">
            <input  name="password" type="password" class="form-control" placeholder="Your Password *" value="" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login" />
        </div>
    </form>
</div>