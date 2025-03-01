<?php
//điều chỉnh kết nối db ở đây
const DBNAME = "php2_exam_3";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";

const BASE_URL = "http://localhost/PHP2/base_exam_php2/";


function redirect($key = "", $msg = "", $url = "")
{
    $_SESSION[$key] = $msg;
    switch ($key) {
        case "errors":
            unset($_SESSION['success']);
            break;
        case "success":
            unset($_SESSION['errors']);
            break;
    }
    header('location: ' . BASE_URL . $url . "?msg=" . $key);
    die;
}

function route($name)
{
    return BASE_URL . $name;
}
