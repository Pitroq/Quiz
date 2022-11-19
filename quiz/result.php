<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
		<nav>
            <a class="option" href="index.php">Strona główna</a>
            <a class="option" href="quiz.php">Quiz</a>
            <a class="option" href="rank.php">Ranking</a>
            <a class="option" href="addQuestion.php">Dodaj pytanie</a>
        </nav>
    </header>
    <article>
        <?php
			session_start();

			if(!isset($_SESSION['scoreText'])){
				header('Location: index.php');
			}
			

		?>
		<p style="font-size: 30px;padding-top:20px;">
            <?php echo $_SESSION['scoreText']; ?><br><br>
            <a style="color:black;text-decoration: underline;font-size:25px" href="index.php">Wróć do strony głównej</a><br>
        </p>
        
        <?php
            include("connect.php");
            if(!isset($_SESSION['userAnswer']) OR !isset($_SESSION['questionCount']) OR !isset($_SESSION['correctAnswer'])){
                header('Location: index.php');
            }

            $idQueList = $_SESSION['idQueList'];
            $questionCount = $_SESSION['questionCount'];
            $userAnswer = $_SESSION['userAnswer'];
            $correctAnswer = $_SESSION['correctAnswer'];
            
            for($i=0;$i < $questionCount;$i++) {
                echo "<div class='question'>";
                $query = mysqli_query($connect, "SELECT pytanie FROM pytania WHERE idPytania = $idQueList[$i];");
                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                foreach($result as $r){
                    echo $r['pytanie']."<br><br>";
                }
                
                if($userAnswer[$i] == $correctAnswer[$i]){
                    echo "Twoja odpowiedź: <span style='color: green;'>".$userAnswer[$i]."</span><br>";
            
                }
                else{
                    echo "Twoja odpowiedź: <span style='color: red;'>".$userAnswer[$i]."</span><br>";
                    echo "Poprawna odpowiedź: <b>".$correctAnswer[$i]."</b><br>";
                }
                echo "</div>";
            }
            

        ?>
        <p style="font-size: 30px;padding-top:20px;">
            <a style="color:black;text-decoration: underline;font-size:25px" href="index.php">Wróć do strony głównej</a><br>
        </p>

    </article>
    <footer></footer>
</body>
</html>