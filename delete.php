<?php 
session_start();
$id=$_GET['id'];
foreach($_SESSION['data'] as $k=>$v)
{
    if($id==$v['id'])
    {
        unset($_SESSION['data'][$k]);
        header('location:listing.php');
    }
}
?>