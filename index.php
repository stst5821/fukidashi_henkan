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

    <!-- フォームの情報を送るページを指定、 今回は1ページのアプリなので自ページ(index.html)に飛ばす。 -->
    <!-- 入力内容をアドレスに含める必要がないので、method="POST"にする。 -->
    <form action="index.php" method="post">

        <!-- ラジオボタン nameを同じにして、valueをそれぞれ設定すると選んだラジオボタンによって表示する内容を変えられる。 -->
        <!-- ↓checkedは、最初に選択されているボタンを決める -->
        <p>1. しゃべらせたい顔文字を選んでね</p>
        <input type="radio" name="kaomoji" value="( *´ω｀*)< " checked>( *´ω｀*)
        <input type="radio" name="kaomoji" value="(  ´；ω；｀)< ">( ´；ω；｀)
        <input type="radio" name="kaomoji" value="（ ´_ゝ`）< ">（ ´_ゝ`）
        <input type="radio" name="kaomoji" value="( ☞◔ ౪◔)☞< ">( ☞◔ ౪◔)☞

        <br><br>

        <!-- value = 初期値 valueを$_POST['name']にすることで、入力したテキストが入力欄にそのまま残るようになる。
        if(isset~)を入れることで、$_POST['name']に値が入っているか確認し、入っていれば$_POST['name']をechoするようにしている。
        if(isset~)を入れなかった場合、最初にページを開いた際、$_POST['name']に値が入っていないため、エラーが出てしまう。 -->
        <p>2. しゃべらせたいコメントを入れて、吹き出すボタンを押してね</p>
        <input type="text" name="name" size="50" value="
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

    // 三項演算子を使ったバージョン
    // 三項演算子 条件文 ? 式1 : 式2 ;
    // 条件文が、trueなら式1、falseなら式2が表示される
    
    $kaomoji = isset($_POST['kaomoji']) ? $_POST['kaomoji'] : "";
    $text = empty($_POST['name']) ? 'コメントを入力してね' : htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'); // ※1
    echo $kaomoji.$text;

    // ※1
    // $_POST['name']の中身は、ページを最初に開いた時 = Null / コメントに何も入力せずsubmitした時 = "" となる。 
    // empty()にすると、値がNull、"" どちらの場合でもtrueになるので、コメントを入力してねという文字列が表示される。
    // isset()の場合は、"" = true / Null = false のため、両方に対応できない。
    // 参考サイト : https://qiita.com/shinichi-takii/items/00aed26f96cf6bb3fe62
    
    // if文を使ったバージョン

    // if(isset($_POST['name'])==true)
    // {
    //     $kaomoji = $_POST['kaomoji'];
    //     $text = $_POST['name'];
    //     $text = htmlspecialchars($text,ENT_QUOTES,'UTF-8');
    //     echo $kaomoji.$text;
    // }
    // else
    // {
    //     echo '喋らせたい言葉を入力してね';
    // }
    
?> </p>

    <p>------------------------------------------------------------------------</p>
    <p>作った人：えすてぃ (twitter:<a href="https://twitter.com/toshow0083">@toshow0083</a>)<br>
        ポートフォリオサイト:<a href="https://esty-studio.com/">STUDIO esty</a>
        <br>
        GitHub:<a href="https://github.com/stst5821/fukidashi_henkan">https://github.com/stst5821/fukidashi_henkan</a>

    </p>

</body>

</html>