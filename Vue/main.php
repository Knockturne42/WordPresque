<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-9">
        <form action="#">
            <input name="generer" value="Jeu de mot aléatoire" class="boutons col btn btn-lg btn-outline-dark" type="submit" id="generer">
        </form>            
    </div>
    <div class="col-lg-6 col-md-9">
        <form action="#">
            <input class="boutons col btn btn-lg btn-outline-dark" placeholder="Choisissez le mot à mixer" type="text" name="userValue">
        </form>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <?php include 'random.php' ?>
    </div>
    <div class="row justify-content-center">
        <?php include 'userChoice.php' ?>
    </div>
</div>
