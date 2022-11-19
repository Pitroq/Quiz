<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <style>
        table, td, th{
            border: 2px solid black;
            border-collapse: collapse;
            padding: 20px;
            padding-left: 50px;
            padding-right: 50px;
            text-align: center;
            
        }
        thead{
            background-color: #24242b;
            color:white;
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
        <center>
            <table>
                <thead>
                    <tr>
                        <td>Miejsce</td>
                        <td>Nick</td>
                        <td>Punkty</td>
                    </tr>
                </thead>
                <?php
                    include("connect.php");
                    $query = mysqli_query($connect, "SELECT * FROM ranking ORDER BY punkty DESC, idWyniku ASC;");
                    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                    $i = 1;
                    foreach($result as $r){
                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>".$r['nazwaUzytkownika']."</td>";
                        echo "<td>".$r['punkty']."/".$r['punktyMax']."</td>";
                        echo "</tr>";
                        $i++;
                    }
                ?>
            </table>
        </center>
    </article>
    <footer></footer>
</body>
</html>