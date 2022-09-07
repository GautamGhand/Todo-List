
<!DOCTYPE html>
<html>

<head>
    <title>TO DO LIST</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2>NOTES</h2>
<table class="tbl">
<th>TITLE</th>
<th>VIEW</th>
<th>EDIT</th>
<th>DELETE</th>
<?php 
session_start();
foreach($_SESSION['data'] as $k=>$v)
{
    echo "<tr>";
?>
        <td><?php echo $v['title']; ?></td>
        <td><?php echo "<a href=\"view.php?id=".$v['id']."\" class=\"link\">VIEW</a>"?></td>
        <td><?php echo "<a href=\"edit.php?id=".$v['id']."\" class=\"link\">EDIT</a>"?></td>
        <td><?php echo "<a href=\"delete.php?id=".$v['id']."\" class=\"link\">DELETE</a>"?></td>
    <?php
    echo "</tr>";
}

if(empty($_SESSION['data']))
{   
    echo "<tr>";
    echo "<td>NO RECORDS FOUND</td>"; 
    echo "</tr>";
}
echo "<a href=\"main.php\" class=\"link\"\>ADD</a>";
    ?>
</table>
</body>
</html>
