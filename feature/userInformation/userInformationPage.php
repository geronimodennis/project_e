<?php
/**
 * Created by PhpStorm.
 * User: dengero
 * Date: 22/03/2019
 * Time: 2:09 AM
 */
?>

<html>
<header>
    <?php include ("../../includes/head-tag-contents.php") ?>
    <link href="../../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <style>
        form label {
            float: left;
            width: 150px;
            margin-bottom: 5px;
            margin-top: 5px;
        }
        .clear {
            display: block;
            clear: both;
            width: 100%;
        }

    </style>
</header>
<body>
<?php include ("../../includes/design-top.php") ?>
<?php include ("../../includes/navigation.php") ?>

<form id="form1" name="form1" method="post" action="UserInformation">
    <label for="userid">Userid</label><input type="text" name="userid" id="userid" />
    <br class="clear" />
    <label for="name">Name</label><input type="text" name="name" id="name" />
    <br class="clear" />
    <label for="lastName">Lastname</label><input type="text" name="lastName" id="lastName" />
    <br class="clear" />
    <label for="middleName">Middlename</label><input type="text" name="middleName" id="middleName" />
    <br class="clear" />
    <label for="email">Email</label><input type="text" name="email" id="email" />
    <br class="clear" />
</form>
</body>
</html>


