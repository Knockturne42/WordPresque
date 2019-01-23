var audio = new Audio('Conception/0564.wav');
var boutonGauche = document.getElementById('genererRnd');
boutonGauche.addEventListener('click', function(){
    audio.play();
})


var range = document.getElementById('rangeGenerator');
var displayRange = document.getElementById('valueRange');
displayRange.innerHTML=range.value;

range.oninput = function(){
    displayRange.innerHTML= this.value;
}