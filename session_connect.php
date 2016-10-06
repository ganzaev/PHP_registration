<?php
function bootstrap(){
    if (!isset($_SESSION['login']))
    session_start();
}


