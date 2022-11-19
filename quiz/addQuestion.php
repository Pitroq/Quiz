<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">
    <style>
        input[type="text"]{
            height:30px;
            width:70%;
        }
        input[type="submit"]{
            height: 40px;
            width: 150px;
            font-size: 18px;
            text-align: center;
        }
        #content{
            height:30px;
            width:80%;
        }
    </style>
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
        <p style="font-size:30px">Dodaj pytanie do quizu:</p><br>
        <div class='question'>
            <form action="sendQuestion.php" method="post">
                <p>Treść pytania: <input id="content" name="content" type="text" required></p>
                <p>Odpowiedź A: <input name="ansA" type="text" required></p>
                <p>Odpowiedź B: <input name="ansB" type="text" required></p>
                <p>Odpowiedź C: <input name="ansC" type="text" required></p>
                <p>Odpowiedź D: <input name="ansD" type="text" required></p>
                <p>Wybierz poprawną odpowiedź na pytanie: 
                    <select name="correctAns">
                        <option value="A" selected>A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </p>
                <input style="float:right;"type="submit" value="Dodaj pytanie"><br>
            </form>
        </div>
    </article>
    <footer></footer>
</body>
</html>