const GAME_WIDTH = 1500;
const GAME_HEIGHT = 700;


var game = function(){
	this.canvas = null;
	this.context = null; 
	this.timeCheck = 5000;
	this.timeFrame = 100;
	var self = this;

	var xucxac = document.getElementById('xucxac');
	var deg = 0;
	var random = 0;
	var faces = document.getElementsByClassName('faceOfDice');
	var score = 10;
	var myScore = document.getElementById('myScore');
	var chanBut = document.getElementById('chanButton');
	var leBut = document.getElementById('leButton');
	var currentWinner = null;
	var username = document.getElementsByTagName('h6')[0].innerText;
	var noti = document.getElementsByClassName('noti');
	var notiScore = document.getElementsByClassName('notiScore');
	var clap = document.getElementsByTagName('audio')[0];
	var earnButton = document.getElementById('earnButton');
	var rollSound = document.getElementsByTagName('audio')[1];

	this.checkIsLose = function(){
		
		axios.get('https://61694b6f09e030001712c272.mockapi.io/lose')
  		.then(function (response) {
    		// handle success
    		console.log(response.data[0].name);
    		for(let i = 0; i < response.data.length; i++){
    			if(response.data[i].name.localeCompare(username) == 0){
    				window.location = 'loser.php';
    			}
    		}
  		})
  		.catch(function (error) {
    		// handle error
    		console.log(error);
  		});
	}

	this.init = function(){
		this.canvas = document.createElement('canvas');
		this.context = this.canvas.getContext('2d');
		this.canvas.width = GAME_WIDTH;
		this.canvas.height = GAME_HEIGHT;
		document.body.appendChild(this.canvas);
		//check current winner
		
		axios.get('https://61694b6f09e030001712c272.mockapi.io/earnWinner')
  		.then(function (response) {
    		// handle success
    		currentWinner = response.data.length;
    		console.log(response.data.length);
  		})
  		.catch(function (error) {
    		// handle error
    		console.log(error);
  		});

  		earnButton.addEventListener('click',function(){
  			let stk = document.getElementById('stk').value; 
  			axios.post('https://61694b6f09e030001712c272.mockapi.io/earnWinner', {
			    name: username,
			    STK: stk,
	  		})
	  		.then(function (response) {
	    		console.log(response);
	  		})
	  		.catch(function (error) {
	    		console.log(error);
	  		});
	  		window.location = 'https://www.facebook.com/index.php';
	  	});
		chanBut.addEventListener('click',self.chanHandle);
		leBut.addEventListener('click',self.leHandle);
		// check winner
		this.checkWinner();
		this.loop();
	}

	this.loop = function(){
		if(score >= 20){
			score = 10;
			self.passGame();
		} else if(score <= 0){
			score = 10;
			self.loseGame();
		}
		setTimeout(self.loop,self.timeFrame);
	}

	this.rotate = function(){
		faces[random].style.display = 'none';
		for(let i = 0; i < noti.length; i++){
			noti[i].style.display = "none";
		}
		rollSound.play();
		xucxac.classList.remove('noneDice');
		xucxac.classList.add('rotate');
		setTimeout(function(){
			xucxac.classList.remove('rotate');
			xucxac.classList.add('noneDice');
			faces[random].style.display = 'none';
			random = Math.round(Math.random() * 5);
			console.log(random);
			faces[random].style.display = 'block';
		},1000)
	}

	this.randomNumber = function(){
		faces[random].style.display = 'none';
		random = Math.round(Math.random() * 5);
		console.log(random);
		faces[random].style.display = 'block';
	
		
	}

	this.checkWinner = function(){
		axios.get('https://61694b6f09e030001712c272.mockapi.io/earnWinner')
  		.then(function (response) {
    		// handle success
    		console.log(response.data.length);
    		if(response.data.length > currentWinner){
    			axios.post('https://61694b6f09e030001712c272.mockapi.io/ppLose', {
				    name: username,
		  		})
		  		.then(function (response) {
		    		console.log(response);
		  		})
		  		.catch(function (error) {
		    		console.log(error);
		  		});
    			alert('Ôi vừa có người về đích trước rồi, chơi lại nhé, +1 quà');
    			window.location = 'xucsacGame.php';
    			document.onmouseup();
    		}
  		})
  		.catch(function (error) {
    		// handle error
    		console.log(error);
  		});
		setTimeout(self.checkWinner, self.timeCheck);
	}

	this.chanHandle = function(){
		setTimeout(function(){
			if((random+1) % 2 == 0){
				score += (random + 1);
				notiScore[0].innerText = ' +' + (random+1);
				noti[0].style.display = 'block';
			} else {
				score -= (random + 1);
				notiScore[1].innerText = ' -' + (random+1);
				noti[1].style.display = 'block';
			}
			myScore.innerText = score;
		},1100);
			
		self.rotate();
	}
	this.leHandle = function(){
		setTimeout(function(){
			if((random+1) % 2 != 0){
				score += (random + 1);
				notiScore[0].innerText = ' +' + (random+1);
				noti[0].style.display = 'block';
			} else {
				score -= (random + 1);
				notiScore[1].innerText = ' -' + (random+1);
				noti[1].style.display = 'block';
			}
			myScore.innerText = score;
		},1200)
		self.rotate();
	}

	this.passGame = function(){
	   	// document.onmouseup();
	   	clap.play();
	   	document.getElementById("gameOverBoard").style.display = "block";
		document.getElementById("pass").style.display = 'block';
		document.getElementById("passMessage").style.display = 'block';
		// document.getElementById("passButton").style.display = 'block';
		
		console.log(username);
		currentWinner++;
		axios.post('https://61694b6f09e030001712c272.mockapi.io/earnWinner', {
		    name: username,
  		})
  		.then(function (response) {
    		console.log(response);
  		})
  		.catch(function (error) {
    		console.log(error);
  		});
	}

	this.loseGame = function(){
		// document.onmouseup();
		document.getElementById("gameOverBoard").style.display = "block";
		document.getElementById("lose").style.display = 'block';
		axios.post('https://61694b6f09e030001712c272.mockapi.io/lose', {
		    name: username,
  		})
  		.then(function (response) {
    		console.log(response);
  		})
  		.catch(function (error) {
    		console.log(error);
  		});
	}
}

var g = new game();
g.checkIsLose();
g.init();