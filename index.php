<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<?php

require 'formulaire.php';

$form = new Form2($_POST);

?>

<form action="#" method="get">

<?php
    echo $form->titre('titre');
    echo $form->text('motChoisis');
    echo $form->text('definition');
    echo $form->submitLike('like');
    echo $form->submitDislike('dislike');

?>

</form>
    
</body>
</html>