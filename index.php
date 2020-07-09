<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <title>吹き出しジェネレーター</title>
</head>

<body>

    <h1>吹き出しジェネレーター</h1>

    <form action="index.php" method="post">


        <input type="radio" name="kaomoji" value="( *´ω｀*)< " checked>( *´ω｀*)
        <input type="radio" name="kaomoji" value="(  ´；ω；｀)< ">( ´；ω；｀)
        <input type="radio" name="kaomoji" value="（ ´_ゝ`）< ">（ ´_ゝ`）
        <input type="radio" name="kaomoji" value="( ☞◔ ౪◔)☞< ">( ☞◔ ౪◔)☞
        <br><br>
        <input type="text" name="name" value="
<?php
        if(isset($_POST['name'])==true) 
            {
            echo $_POST['name'];
            } 
?>">

        <input type="submit" value="吹き出す">
    </form>

    <br>
    <p><?php
    
    if(isset($_POST['name'])==true)
    {
        $kaomoji = $_POST['kaomoji'];
        $text = $_POST['name'];
        $text = htmlspecialchars($text,ENT_QUOTES,'UTF-8');
        echo $kaomoji.$text;
    }
    else
    {
        echo '喋らせたい言葉を入力してね';
    }
?> </p>

</body>

</html>