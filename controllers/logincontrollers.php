<?php
namespace ganzaev\controllers;
session_start();
$_SESSION['email']=null;
$_SESSION['realname']=null;
class LoginControllers
{
    public function UserDbConnection()
    {
        $link = mysqli_connect("localhost", "root", "", "blog");
        if (isset($_POST['submit'])) {
            $query = mysqli_query($link, "SELECT password,login,email,realname FROM userstable WHERE login='" . mysqli_real_escape_string($link, $_POST['login']) . "' OR email='". mysqli_real_escape_string($link, $_POST['login']) ."' LIMIT 1");
            $data = mysqli_fetch_assoc($query);
            if ((md5($_POST['password']) != $data['password'])) {
                echo "Your password is incorrect";
            } else {
                $_SESSION['realname'] = $data['realname'];
                $_SESSION['email'] = $data['email'];
                header("Location: index.php?page=logout");
            }
        }
    }

    public function Action()
    {
        $this->UserDbConnection();
        include_once('/xampp/htdocs/views/LoginViews.php');
    }
}