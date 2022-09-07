
<!DOCTYPE html>
<html>

<head>
    <title>TO DO LIST</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <section class="container">
    <h1>TO DO LIST</h1>
        <section class="frm">
            <form action="add.php" method="POST">
                <label class="txt">TITLE</label>
                <input type="text" name="title" class="inpt">
                <div class="error">
                    <?php 
                    session_start();
                    include('add.php');
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
                <textarea rows=4 cols=4 name="description" class="inpt"></textarea>
                <div class="error">
                    <?php 
                        if(!empty($_SESSION['error']))
                        {
                            if(isset($_SESSION['error']['description']))
                            {
                                echo $_SESSION['error']['description'];
                            }
                        }
                        unset($_SESSION['error']);
                    ?>
                </div>
                <input type="submit" name="submit" class="btn" value="ADD">
            </form>
        </section>
    </section>
</body>

</html>