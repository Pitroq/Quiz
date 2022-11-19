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
        input[type="submit"]{
            height: 40px;
            width: 150px;
            font-size: 18px;
            text-align: center;
        }
        

    input[type='radio']:checked:after {
        width: 9px;
        height: 9px;
        border-radius: 15px;
        top: 0px;
        left: 0px;
        position: relative;
        background-color: #24242b;
        content: '';
        display: inline-block;
        border: 2px solid white;
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
        <form action='sendResult.php' method='POST'>
			<div class='question' style="height: 70px;"> 
				Podaj swój nick: <input name="nick" type="text" minlength="3" maxlength="19" required>
			</div>
            <?php
                
                session_start();

                $questionCount = 10;

                $_SESSION['questionCount'] = $questionCount;

                include("connect.php");

                $query = mysqli_query($connect, "SELECT * FROM pytania");
                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

                $i = 0;
                foreach($result as $r){ //zapisywanie id pytan do tablicy $questionId (id mogą byc nie pelne mp."1,2,5,6,7,10,11...") - brakuje 3,4,8,9 - wiec latwiej bedzie odniesc sie do nuemeru w tablicy pod ktorym kryje sie id
                    $questionId[$i] = $r['idPytania']; 
                    $i = $i + 1;
                }
                
                for ($i=0;$i<$questionCount;$i++){
                    $position = rand($i,count($questionId)-1);
                    $temp = $questionId[$i];
                    $questionId[$i] = $questionId[$position];
                    $questionId[$position] = $temp;
                }
                
                
				$x = 0;
                for($i=0;$i<$questionCount;$i++){
					
                    $query = mysqli_query($connect, "SELECT * FROM pytania WHERE idPytania = $questionId[$i]");
                    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                    foreach($result as $r){
                        echo "<div class='question'>";
                        echo $r['pytanie']."<br><br>";
                        
                        $questionAnswer[0] = $r['odpA']; 
                        $questionAnswer[1] = $r['odpB']; 
                        $questionAnswer[2] = $r['odpC']; 
                        $questionAnswer[3] = $r['odpD']; 

						$idQueList[$x] = $r['idPytania'];
                        $x ++;
                    
                        $questionAnswer[0] = "<input type='radio' name='que$i' value='$questionAnswer[0]' required>".$questionAnswer[0]; 
                        
                        $questionAnswer[1] = "<input type='radio' name='que$i' value='$questionAnswer[1]' required>".$questionAnswer[1]; 
                        
                        $questionAnswer[2] = "<input type='radio' name='que$i' value='$questionAnswer[2]' required>".$questionAnswer[2]; 
                        
                        $questionAnswer[3] = "<input type='radio' name='que$i' value='$questionAnswer[3]' required>".$questionAnswer[3]; 

                        for ($i1=0;$i1<4;$i1++){
                            $position1 = rand($i1,3);
                            $temp1 = $questionAnswer[$i1];
                            $questionAnswer[$i1] = $questionAnswer[$position1];
                            $questionAnswer[$position1] = $temp1;
                        }
                        
                        echo $questionAnswer[0]."<br>";
                        echo $questionAnswer[1]."<br>";
                        echo $questionAnswer[2]."<br>";
                        echo $questionAnswer[3]."<br>";
                        echo "</div>";
                    }
                }

                $_SESSION['idQueList'] = $idQueList;
                
                mysqli_close($connect);
            ?>
            <input style="width:200px" type="submit" value="Wyślij odpowiedzi">
        </form>
    </article>
    <footer></footer>
</body>
</html>
 
