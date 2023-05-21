<?php 
session_start();
require_once "engine.php";


if (isset($_POST['1'])) {
    setCoste($_POST['1'], 1, $_POST['notka']);
    header('Location:../podstrony/wydatki.php');
}

if (isset($_POST['2'])) {
    setCoste($_POST['2'], 2, $_POST['notka']);
    header('Location:../podstrony/wydatki.php');
}

if (isset($_POST['3'])) {
    setCoste($_POST['3'], 3, $_POST['notka']);
    header('Location:../podstrony/wydatki.php');
}

if (isset($_POST['4'])) {
    setCoste($_POST['4'], 4, $_POST['notka']);
    header('Location:../podstrony/wydatki.php');
}

if (isset($_POST['5'])) {
    setCoste($_POST['5'], 5, $_POST['notka']);
    header('Location:../podstrony/wydatki.php');
}

if (isset($_POST['6'])) {
    setCoste($_POST['6'], 6, $_POST['notka']);
    header('Location:../podstrony/wydatki.php');
}

if (isset($_POST['7'])) {
    setCoste($_POST['7'], 7, $_POST['notka']);
    header('Location:../podstrony/wydatki.php');
}

if (isset($_POST['8'])) {
    setCoste($_POST['8'], 8, $_POST['notka']);
    header('Location:../podstrony/wydatki.php');
}

if (isset($_POST['9'])) {
    setCoste($_POST['9'], 9, $_POST['notka']);
    header('Location:../podstrony/wydatki.php');
}

if (isset($_POST['10'])) {
    setCoste($_POST['10'], 10, $_POST['notka']);
    header('Location:../podstrony/wydatki.php');
}

?>