<?php

namespace ganzaev\controllers;
session_start();
$_SESSION['email']=null;
$_SESSION['realname']=null;

class RegisterControllers
{
    public function Action()
    {
        $this->Connect_to_DB();
        include("/xampp/htdocs/views/RegisterViews.php");
    }

    public static function getCountry()
    {
        $db = mysqli_connect("localhost", "root", "", "blog");
        $result = $db->query("SELECT name FROM country");
        while ($data = $result->fetch_array()) {
            echo "<option value=" . $data['name'] . ">" . $data['name'] . "</option>";
        }
    }

    public function Connect_to_DB()
    {
        $db = mysqli_connect("localhost", "root", "", "blog");
        if (isset($_POST['submit'])) {
            $err = array();
            if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
                $err[] = "Please use only english letter and number";
            }
            if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['realname'])) {
                $err[] = "Please use only english letter and number";
            }
            if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 32) {
                $err[] = "Please choose more than 3 symbols";
            }
            $reglogin = mysqli_query($db, "SELECT login FROM userstable WHERE login='" . mysqli_real_escape_string($db, $_POST['login']) . "'");
            if (mysqli_num_rows($reglogin) > 0) {
                $err[] = "Users with this login already registered";
            }
            $regemail = mysqli_query($db, "SELECT email FROM userstable WHERE email='" . mysqli_real_escape_string($db, $_POST['email']) . "'");
            if (mysqli_num_rows($regemail) > 0) {
                $err[] = "Users with this email already registered";
            }
            if (!empty($_POST['password']) and substr_compare($_POST['password'], $_POST['cpassword'], 0)) {
                $err[] = "Repeat please password";
            }
            if (count($err) == 0) {
                $login = $_POST['login'];
                $password = md5(trim($_POST['password']));
                $email = $_POST['email'];
                $country = $_POST['country'];
                $realname = $_POST['realname'];
                $dateofbirth = $_POST['dateofbirth'];
                $registrationtime = time();
                mysqli_query($db, "INSERT INTO userstable (login,email,password,realname,country,dateofbirth,registrationtime) VALUES ('$login','$email','$password','$realname','$country','$dateofbirth','$registrationtime')");
                $_SESSION['email']=$email;
                $_SESSION['realname']=$realname;
                header("Location: index.php?page=logout");

                exit();
            } else {
                print "<b>Error:</b><br>";
                foreach ($err AS $error) {
                    print $error . "<br>";
                }
            }
        }
    }
}