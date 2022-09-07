<!DOCTYPE html>
<html>

<head>
    <title>TO DO LIST</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<table>
    <tr>
    <th>Description</th>
    </tr>
<?php 
session_start();
include('validation.php');
$valid=pageblock($_SESSION);
if($valid==false)
{
    header('location:main.php');
}
$id=$_GET['id'];
$desc=[];
foreach($_SESSION['data'] as $k=>$v)
{
    if($id==$v['id'])
    {
        $desc=$_SESSION['data'][$k];
?>
 <tr>
        <td><?php echo $desc['description']; ?></td>
<?php
    }
}
echo "</tr>";
?>
</table>
<a href="listing.php" class="link">BACK</a>
</body>
</html>