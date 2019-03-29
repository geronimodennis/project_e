<?php
/**
 * Created by PhpStorm.
 * User: dengero
 * Date: 29/03/2019
 * Time: 9:44 PM
 */

include "ManageUser.php";
$manageUser = new ManageUser();
$userList = $manageUser->getUserList();
?>

<table id="example" class="table table-sm table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Edit</th>
        <th>User Id</th>
        <th>User</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($userList as $user){
        $comName = $user->getCompleteName();
        echo "<tr>
            <td><a href='index.php?page=register&userId=$user->userId'>Edit</a></td>
            <td>$user->userId</td>
            <td>$comName</td>
            </tr>";
    }
    ?>
    </tbody>

</table>
