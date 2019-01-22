var genererRnd = document.getElementById('genererRnd');
genererRnd.addEventListener("click", function(){
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function (argument) {
		if (httpRequest.readyState === 4)
		document.getElementById('result').innerHTML = httpRequest.responseText;
	}
	httpRequest.open('GET', './Vue/random.php?generer=Jeu+de+mot+aléatoire', true);
	httpRequest.send();
	setTimeout(function(){var motDb = document.getElementById('motDb');	console.log(motDb); }, 500);
	setTimeout(function(){var mot1 = document.getElementById('mot1');	console.log(mot1); }, 500);
	setTimeout(function(){var mot2 = document.getElementById('mot2');	console.log(mot2); }, 500);
	setTimeout(function(){
		var validerMot = document.getElementById('validerMot');
		validerMot.addEventListener("click", function(){
				var httpRequest = new XMLHttpRequest();
				httpRequest.onreadystatechange = function (argument) {
					if (httpRequest.readyState === 4)
					document.getElementById('result').innerHTML = httpRequest.responseText;
				}
				httpRequest.open('GET', './Vue/random?motFinalDb='+motDb.value+'&motInit='+mot1.value+'&monMot='+mot2.value+'&enregistrerRnd='+1+'', true);
				httpRequest.send();
				setTimeout(function(){var def = document.getElementById('def');	console.log(def); }, 500);
				setTimeout(function(){var motDef = document.getElementById('motDef');	console.log(motDef); }, 500);
				setTimeout(function(){
				var subDef = document.getElementById('subDef');
					subDef.addEventListener("click", function(){
							var httpRequest = new XMLHttpRequest();
							httpRequest.onreadystatechange = function (argument) {
								if (httpRequest.readyState === 4)
								document.getElementById('result').innerHTML = httpRequest.responseText;
							}
							httpRequest.open('GET', './Vue/random?defArea='+def.value+'&motFinal='+motDef.value+'&submitDef='+1+'', true);
							httpRequest.send();
					});
				}, 500);
		});
		}, 500);
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
		httpRequest.open('GET', './Vue/userChoice.php?userValue='+genererUser.value+'', true);
		httpRequest.send();
		setTimeout(function(){var motDb = document.getElementById('motDb');	console.log(motDb); }, 500);
		setTimeout(function(){var mot1 = document.getElementById('mot1');	console.log(mot1); }, 500);
		setTimeout(function(){var mot2 = document.getElementById('mot2');	console.log(mot2); }, 500);
		setTimeout(function(){
		var validerMot = document.getElementById('validerMot');
		validerMot.addEventListener("click", function(){
				var httpRequest = new XMLHttpRequest();
				httpRequest.onreadystatechange = function (argument) {
					if (httpRequest.readyState === 4)
					document.getElementById('result').innerHTML = httpRequest.responseText;
				}
				httpRequest.open('GET', './Vue/userChoice.php?motFinalDb='+motDb.value+'&motInit='+mot1.value+'&monMot='+mot2.value+'&enregistrerInp='+1+'', true);
				httpRequest.send();
				setTimeout(function(){var def = document.getElementById('def');	console.log(def); }, 500);
				setTimeout(function(){var motDef = document.getElementById('motDef');	console.log(motDef); }, 500);
				setTimeout(function(){
				var subDef = document.getElementById('subDefChoice');
					subDef.addEventListener("click", function(){
							var httpRequest = new XMLHttpRequest();
							httpRequest.onreadystatechange = function (argument) {
								if (httpRequest.readyState === 4)
								document.getElementById('result').innerHTML = httpRequest.responseText;
							}
							httpRequest.open('GET', './Vue/userChoice.php?defArea='+def.value+'&motFinal='+motDef.value+'&submitDefChoice='+1+'', true);
							httpRequest.send();
					});
				}, 500);
		});
		}, 500);
	}
});

var topGame = document.getElementById('topGame');
topGame.addEventListener('click', function(){
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function (argument) {
	if (httpRequest.readyState === 4)
		document.getElementById('main').innerHTML = httpRequest.responseText;
	}
	httpRequest.open('GET', './Vue/showTops.php', true);
	httpRequest.send();
});

var index = document.getElementById('index');
index.addEventListener('click', function(){
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function (argument) {
	if (httpRequest.readyState === 4)
		document.getElementById('main').innerHTML = httpRequest.responseText;
	}
	httpRequest.open('GET', './Vue/main.php', true);
	httpRequest.send();
});

var logo = document.getElementById('logo');
logo.addEventListener('click', function(){
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function (argument) {
	if (httpRequest.readyState === 4)
		document.getElementById('main').innerHTML = httpRequest.responseText;
	}
	httpRequest.open('GET', './Vue/main.php', true);
	httpRequest.send();
});