<?php
if(empty($_SESSION['email']))
{
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<div class="container">
    <form class="form-horizontal" style="margin-top: 100px;">
        <div class="form-group">
        <?php
        echo "Email:".$_SESSION['email']."<br>";
        echo "Real name:".$_SESSION['realname']."<br>";
        echo "<a href='index.php'>Logout</a>";
        ?>
        </div>
    </form>
</div>

