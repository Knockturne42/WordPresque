var genererRnd = document.getElementById('genererRnd');
genererRnd.addEventListener("click", function(){
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function (argument) {
		if (httpRequest.readyState === 4)
		document.getElementById('result').innerHTML = httpRequest.responseText;
	}
	httpRequest.open('GET', './Vue/random.php?generer=Jeu+de+mot+aléatoire', true);
	httpRequest.send();
});

var genererUser = document.getElementById('genererUser');
genererUser.addEventListener("keypress", function(e){
	if (13 == e.keyCode)
	{
		var httpRequest = new XMLHttpRequest();
		httpRequest.onreadystatechange = function (argument) {
			if (httpRequest.readyState === 4)
			document.getElementById('result').innerHTML = httpRequest.responseText;
		}
		httpRequest.open('GET', './Vue/userChoice?userValue='+genererUser.value+'', true);
		httpRequest.send();
	}
});