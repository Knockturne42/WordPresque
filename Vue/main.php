<div id="rndDiv" class="row justify-content-center">
	<div class="col-lg-12 col-md-12 text-center">
<!--         <div id="genererUser" class="boutons col btn btn-lg btn-outline-dark"></div> -->
<!--         <form action="#"> -->
            <p class="btn btn-secondary disabled">Choisissez le nombre de lettres en commun entre les deux mots: <span id="valueRange" class="btn btn-danger disabled"></span></p>
            <input id="rangeGenerator" class="boutons col btn btn-lg btn-outline-secondary" type="range" name="rangeGenerator" min="1" max="6" value="1">
<!--         </form> -->
    </div>
    <div class="col-lg-6 col-md-9">
<!--         <div id="genererRnd" class="boutons col btn btn-lg btn-outline-dark"><p>Jeu de mot aléatoire</p></div>
        <form action="#"> -->
            <input id="genererRnd" name="generer" value="Jeu de mot aléatoire" class="boutons col btn btn-lg btn-outline-secondary" type="submit" id="generer">
<!--         </form>  -->           
    </div>
    <div class="col-lg-6 col-md-9">
<!--         <div id="genererUser" class="boutons col btn btn-lg btn-outline-dark"></div> -->
<!--         <form action="#"> -->
            <input id="genererUser" class="boutons col btn btn-lg btn-outline-secondary" placeholder="Choisissez le mot à mixer" type="text" name="userValue">
<!--         </form> -->
    </div>
</div>
<div class="container" id="result">
    <div class="row justify-content-center">
    </div>
</div>