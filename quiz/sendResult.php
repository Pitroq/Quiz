
<?php
    session_start();

    if(!isset($_SESSION['idQueList']) OR !isset($_SESSION['questionCount']) OR !isset($_POST['que0'])){
        header('Location: index.php');
    }

    $idQueList = $_SESSION['idQueList'];
    $questionCount = $_SESSION['questionCount'];

    include("connect.php");

    //zapisywanie odpowiedzi uzytkownika do tablicy:

    for($i=0;$i<$questionCount;$i++){
        $text = "que".$i;
        $userAnswer[$i] = $_POST[$text];
    }
    

    //zapisywanie poprawnych odpowiedzi do tablicy:

    for($i=0;$i<count($idQueList);$i++){

        $query = mysqli_query($connect, "SELECT odpPoprawna FROM pytania WHERE idPytania = $idQueList[$i]");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        foreach($result as $r){
            $text = "odp".$r['odpPoprawna'];
            $query2 = mysqli_query($connect, "SELECT $text FROM pytania WHERE idPytania = $idQueList[$i]");
            $result2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
            foreach($result2 as $r){
                //echo $r[$text]."<br>";
                $correctAnswer[$i] = $r[$text];
            }

        }
    }
    $score = 0;

    
    /*
    
    foreach ($userAnswer as $uA) {
        echo $uA."---";
    }
    echo "<br><br>";

    foreach ($correctAnswer as $cA) {
        echo $cA."---";
    }
    
    */
    //for($i=0;$i<$questionCount;$i++){
    //	if($userAnswer[$i] == $correctAnswer[$i]) $score += 1;
    //}

    foreach (array_combine($userAnswer, $correctAnswer) as $uA => $cA) {
        if($uA == $cA) $score += 1;
    }

    $userNick = $_POST['nick'];


    $query3 = mysqli_query($connect,"INSERT INTO ranking VALUES(NULL,'$userNick',$score,$questionCount);");

    $_SESSION['scoreText'] = "Wynik użytkownika $userNick:<br> $score/$questionCount";
    $_SESSION['userAnswer'] = $userAnswer;
    $_SESSION['correctAnswer'] = $correctAnswer;

    header('Location: result.php');
?>