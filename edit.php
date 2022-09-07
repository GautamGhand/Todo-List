<?php 
session_start();
include('validation.php');
$id=$_GET['id'];
$count =0;
$value=[];
$valid=pageblock($_SESSION);
if($valid==false)
{
    header('location:main.php');
}
foreach($_SESSION['data'] as $k=>$v)
{
   
    if($id==$v['id'])
    {
        $value=$v;
        $count=0;
        break;
    }
    else{
       $count++;
    }
}
if($count>0)
{
    header('location:main.php');
}
if(!empty($_POST['submit']))
{
    global $id;
    $err=[];
    $err=validate($_POST);
    if(!empty($err))
    {
        $_SESSION['error']=$err;
        header('location:edit.php?id='.$id);
    }
    else
    {
        if(!empty($_SESSION['error']))
        {
            unset($_SESSION['error']);
        }
        foreach($_SESSION['data'] as $key=>$values) 
        {
            if ($values['id']== $id) 
            {
                $_POST['id']=$id;
                $_SESSION['data'][$key]=$_POST;
                header('location:listing.php');
            }
        }
    }  
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>TO DO LIST</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <section class="container">
        <section class="frm">
            <form action="" method="POST">
                <label class="txt">TITLE</label>
                <input type="text" name="title" class="inpt" value=<?php echo $value['title'] ?> >
                <div class="error">
                    <?php 
                        if(!empty($_SESSION['error']))
                        {
                            if(isset($_SESSION['error']['title']))
                            {
                                echo $_SESSION['error']['title'];
                            }
                        }
                    ?>
                </div>
                <label class="txt">DESCRIPTION</label>
                <textarea rows=4 cols=4 name="description" class="inpt"><?php echo $value['description']; ?></textarea>
                <div class="error">
                    <?php 
                        if(!empty($_SESSION['error']))
                        {
                            if(isset($_SESSION['error']['description']))
                            {
                                echo $_SESSION['error']['description'];
                            }
                        }
                    ?>
                </div>
                <input type="submit" name="submit" class="btn" value="EDIT">
            </form>
        </section>
    </section>
</body>

</html>