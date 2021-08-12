<?php

function addPortfolio($img, $description, $user_id) {
    $con = mysqli_connect("localhost", "root", "", "profile");

    $query = "INSERT INTO `portfolio` (`img`, `description`, `user_id`) VALUES ('$img', '$description', '$user_id')";

    
    mysqli_query($con, $query);
    
    $res = mysqli_affected_rows($con);
    
    if($res == 1) {
        return true;
    } else {
        echo "Weselna";
        return false;
    }
}

function getPortfolio() {
    $con = mysqli_connect("localhost", "root", "", "profile");

    $query = "SELECT `portfolio`.`id`, `portfolio`.`img`, `portfolio`.`description`, `user`.`username`  FROM `portfolio` Inner Join `user` ON `portfolio`.`user_id` = `user`.`id`";

    $q = mysqli_query($con, $query);

    $projects = [];

    while($res = mysqli_fetch_assoc($q)) {
        $projects[] = $res;
    }

    return $projects;
}

function deletePortfolio($project_id) {
    $con = mysqli_connect("localhost", "root", "", "profile");

    $query = "Delete from `portfolio` where `id` = $project_id";

    
    mysqli_query($con, $query);
    
    $res = mysqli_affected_rows($con);
    
    if($res == 1) {
        return true;
    } else {
        return false;
    }
}

function getPortfolioByID($proid) {
    $con = mysqli_connect("localhost", "root", "", "profile");

    $query = "SELECT * From `portfolio` WHERE `id`= $proid";

    $q = mysqli_query($con, $query);

    $res = mysqli_fetch_assoc($q);

    return $res;
}

function updatePortfolio($project_id, $img, $desc) {
    $con = mysqli_connect("localhost", "root", "", "profile");

    $query = "Update `portfolio` SET `description`='$desc'";
    if(!empty($img)) {
        $query .= ", `img`='$img'";
    }
    
    $query .= "where `id` = $project_id";

    mysqli_query($con, $query);
    
    $res = mysqli_affected_rows($con);
    
    if($res == 1) {
        return true;
    } else {
        echo "Weselna";
        return false;
    }
}