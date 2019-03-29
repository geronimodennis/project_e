<!-- HTML Form (wrapped in a .bootstrap-iso div) -->

<?php
include "ManageUser.php";
$user = new UserEntity();
$credential = new userCredentialEntity();
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $user->userId = $_POST["userId"];
    $user->firstName = $_POST["firstName"];
    $user->middleName = $_POST["midName"];
    $user->lastName = $_POST["lastName"];
    $user->email = $_POST["email"];
    $user->save();

    $credential->userId = $user->userId;
    $credential->userName = $_POST["username"];
    $credential->password = $_POST["password"];
    $credential->save();
}
?>

<div class="container-fluid col-md-7 row">
    <form class="container" method="post" data-toggle="validator">
        <div class="form-group ">
            <label class="control-label requiredField" for="userId">
                User ID
            </label>
            <input type="text" class="form-control-plaintext d-inline-block col-4" id="userId" name="userId" placeholder="To Be Generated" readonly value="<?php echo $user->userId ?>"/>
            <input type="hidden" class="form-control-plaintext d-inline-block col-4" id="credId" name="credId" placeholder="To Be Generated" readonly value="<?php echo $credential->id ?>"/>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" style="width: 100%" for="name">
                Name ML, Surname
                <span class="asteriskField">*</span>
            </label>
            <input type="text" class="form-control d-inline-block" style="width: 40%" id="firstName" name="firstName" value="<?php echo $user->firstName ?>" required/>
            <input type="text" class="form-control d-inline-block" style="width: 18%" id="midName" name="midName" value="<?php echo $user->middleName ?>" />
            <input type="text" class="form-control d-inline-block" style="width: 40%" id="lastName" name="lastName" value="<?php echo $user->lastName ?>" required/>
        </div>
        <div class="form-group ">
            <label class="control-label requiredField" for="email">
                Email
                <span class="asteriskField">*</span>
            </label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email ?>" required/>
        </div>

        <div class="form-group ">
            <label class="control-label " for="username">
                username
            </label>
            <input type="text" class="form-control" id="username" name="username" value="<?php /*echo $credential->userName */?>" required/>
        </div>
        <div class="form-group ">
            <label class="control-label " for="password">
                password
            </label>
            <div class="form-inline ">
                <input type="password" data-minlength="6" class="form-control" id="password" name="password" value="" required>
                <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" value="" data-match="#password" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group">
            <div>
                <button class="btn btn-primary " name="submit" type="submit">
                    Submit
                </button>
            </div>
        </div>
    </form>
</div>