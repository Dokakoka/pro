<?php

function addUser($name, $email, $password) {
    $con = mysqli_connect("localhost", "root", "", "profile");
    $quer = "INSERT INTO `user` (`username`, `email`, `password`) VALUES('$name', '$email', '$password')";
    mysqli_query($con, $quer);

    $res = mysqli_affected_rows($con);

    if($res == 1) {
        return true;
    } else {
        return false;
    }
}

function login($email, $password) {
    $con = mysqli_connect("localhost", "root", "", "profile");
    $quer = "Select * from `user` where `email` = '$email' && `password` = '$password'";
    $q = mysqli_query($con, $quer);

    $res = mysqli_fetch_assoc($q);

    return $res;
}