<?php
    //resetowanie zmiennych sesyjnych
    session_start();
    unset($_SESSION['idQueList']);
    unset($_SESSION['questionCount']);
    unset($_SESSION['scoreText']);
    unset($_SESSION['userAnswer']);
    unset($_SESSION['correctAnswer']);


?>
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
        <p style="font-size: 34px;padding-top:60px;">
        <br><br>Chcesz sprawdzić swoją wiedzę na temat informatyki i programowaniu?<br><br>
        To świetnie trafiłeś!<br><br>
        Zapraszam do wzięcia udziału w quizie:<br><br>
        <a style="color:black;text-decoration: underline;font-size:40px" href="quiz.php">Quiz</a><br>
        </p>
    </article>
    <footer></footer>
</body>
</html>