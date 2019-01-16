<div class="container">
<div class="row">
<button class="col btn btn-lg btn-outline-dark" type="button" data-toggle="collapse" data-target="#random" aria-expanded="false" aria-controls="random">
    Jeu de mot aléatoire
</button>
<button class="col btn btn-lg btn-outline-dark" type="button" data-toggle="collapse" data-target="#userChoice" aria-expanded="false" aria-controls="userChoice">
    Choisissez le mot à mixer
</button>
</div>
</div>
<div class="container">
<div class="collapse" id="random">
  <div class="card card-body">
    <?php include 'random.php' ?>
  </div>
</div>
<div class="collapse" id="userChoice">
  <div class="card card-body">
    <?php include 'userChoice.php' ?>
  </div>
</div>
</div>