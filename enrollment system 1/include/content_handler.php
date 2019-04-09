<?php

echo "if page";
if(isset($_SESSION[APP_USER_CREDENTIAL_AUTH] )){
    include "features/main_context.php";

    return;
}

if ( $_GET['page'] == "main" ){
    include "features/main_context.php";
}else{
    echo "else";
}