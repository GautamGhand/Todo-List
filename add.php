<?php 
include('validation.php');
if(!empty($_POST['submit']))
{
    session_start();
    $err=[];
    $err=validate($_POST);
    if(!empty($err))
    {
        $_SESSION['error']=$err;
        header('location:main.php');
    }
    else
    {   
        if(!empty($_SESSION['error']))
        {
            unset($_SESSION['error']);
        }
        $cnt=!empty($_SESSION['data'])?count($_SESSION['data']):0;
        $_POST['id']=$cnt+1;
        $_SESSION['data'][]=$_POST;
        $_SESSION['success']=false;
        header('location:listing.php');
    }
}
?>