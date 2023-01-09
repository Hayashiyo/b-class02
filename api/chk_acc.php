<?php
include_once "./base.php";

$user=$User->count(['acc'=>$_POST['acc']]);
if($user>0){
    echo 1;
}else{
    echo 0;
}
// echo $user?0:1

?>