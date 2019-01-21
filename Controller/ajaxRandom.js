var genererRnd = document.getElementById('generer');
genererRnd.addEventListener("click", function(){
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function (argument) {
		if (httpRequest.readyState === 4)
		document.getElementById('result').innerHTML = httpRequest.responseText;
	}
	httpRequest.open('GET', './php/random.php?generer=Jeu+de+mot+aléatoire', true);
	httpRequest.send();
});