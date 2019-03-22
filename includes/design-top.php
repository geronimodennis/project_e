<?php include_once ("config.php")?>
<ul class="nav justify-content-end">
    <li class="nav-item">
        <a class="nav-link active" href="#">register</a>
    </li>
    <li class="nav-item">
        <?php
        if(empty($_SESSION[APP_USER_CREDENTIAL_AUTH])){
            echo '<a class="nav-link" href="index.php?page=logout">Log in</a>';
        }else{
            echo '<span class="d-inline-block">' . $_SESSION[APP_USER_CREDENTIAL_AUTH] . '<a class="nav-link d-inline-block" href="feature/login/logout.php">Sign out</a></span>';
        }
        ?>
    </li>
</ul>
