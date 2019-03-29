
<div class="container">
    <?php
    if(!isset($_GET['page']))
        return;

    if($_GET['page'] == 'login'){
        include "feature/login/login.php";
        return;
    }else if($_GET['page'] == 'register'){
        include "feature/userInformation/userInformationPage.php";
    }else if($_GET['page'] == 'userManagement'){
        include "feature/userInformation/userList.php";
    }

    ?>
</div>