<?php

    $content = $_POST['content'];
    $odpA = $_POST['ansA'];
    $odpB = $_POST['ansB'];
    $odpC = $_POST['ansC'];
    $odpD = $_POST['ansD'];
    $correctAns = $_POST['correctAns'];

    /*
    echo $content."<br>";
    echo $odpA."<br>";
    echo $odpB."<br>";
    echo $odpC."<br>";
    echo $odpD."<br>";
    echo $correctAns."<br>";
    */

    include("connect.php");
    $query3 = mysqli_query($connect,"INSERT INTO pytania VALUES(NULL,'$content','$odpA','$odpB','$odpC','$odpD','$correctAns');");


    header('Location: index.php');

    

?>