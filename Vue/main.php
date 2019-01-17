<div class="container">
<form action="#">
<div class="row">
<input name="generer" value="Jeu de mot aléatoire" class="col btn btn-lg btn-outline-dark" type="submit" data-toggle="collapse" data-target="#random" aria-expanded="false" aria-controls="random">
<input class="col btn btn-lg btn-outline-dark" value="Choisissez le mot à mixer" type="submit" data-toggle="collapse" data-target="#userChoice" aria-expanded="false" aria-controls="userChoice">
</div>
</div>
</form>
<div class="container">
<div class="collapse" id="random">
  <div class="card card-body" id="resultRandom">
    <?php include 'random.php' ?>
  </div>
</div>
<div class="collapse" id="userChoice">
  <div class="card card-body" id="resultUserchoice">
    <?php include 'userChoice.php' ?>
  </div>
</div>
</div>