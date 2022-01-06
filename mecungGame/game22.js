const GAME_WIDTH = 1500;
const GAME_HEIGHT = 700;

var game = function(){
	this.timeFrame = 50;
	this.timeCheck = 5000;
	this.way = null;
	this.canvas = null;
	this.context = null;

	var self = this;
	var moveElm = document.getElementById('moveElement');
	var sotime = 60;
	var loi = document.getElementById('time');
	var currentWinner = null;
	var tiktak = document.getElementsByTagName('audio')[0];
    moveElm.offsetLeft = 0;
	moveElm.offsetTop = 0;

	var clap = document.getElementsByTagName('audio')[1];
	var hienra = document.getElementsByClassName('hienra');
	var hienraIndex = -1;
	this.init = function(){
		// create game canvas 
		this.canvas = document.createElement('canvas');
		this.context = this.canvas.getContext('2d');
		this.canvas.width = GAME_WIDTH;
		this.canvas.height = GAME_HEIGHT;
		document.body.appendChild(this.canvas);
		// console.log('abc1');
		// get winner current
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

  		document.body.addEventListener('click',function(){
			console.log(event.clientX + '-' + event.clientY);
		})

		//Start the world
		this.checkWinner();
		this.runtime();
		// self.hienra();
		this.loop();
	}

	this.hienra = function(){
		if(hienraIndex >= 0){
			hienra[hienraIndex].style.display = 'block';
  			var nowIndex = hienraIndex;
  			if(hienraIndex < hienra.length - 1) hienraIndex++;
  			else {
  				console.log(hienraIndex); 
  				if(hienraIndex == 0) hienraIndex++;
  				else hienraIndex--;
  				
  			}
  			setTimeout(function(){
  				hienra[nowIndex].style.display = 'none';
  			},2500)
		}
		else hienraIndex++;
		setTimeout(self.hienra,10000);
	}	

	this.loop = function(){
		//create way
		self.way = new way(self);
		self.way.init();	
		self.way.draw();	

		// check lose game
		var l = moveElm.offsetLeft;
		var t = moveElm.offsetTop;
		if((l+20) > 40 && t < 508 && l < 308){
			self.loseGame();
		} else if((l+20) < 338 && (t+20) > 540){
			self.loseGame();
		} else if(l < 8 && t < 538){
			self.loseGame();
		} else if(l > 308 && t < 208 && l <= 408){
			self.loseGame();	 
		} else if((l+20) > 340 && (t+20) > 240 && l < 438){
			self.loseGame();
		} else if(l > 408 && l < 540 && t < 108){
			self.loseGame();
		} else if((l+20) > 441 && (t+20) > 140 && l < 508  ){
			self.loseGame();
		} else if((l+20) > 540 && t < 308){
			self.loseGame();
		} else if(l > 508 && (t+20) > 340 && l < 708){
			self.loseGame();
		} else if((l+20) > 740 && t < 508 && l < 1208){
			self.loseGame();
		} else if((t+20) > 540){
			self.loseGame();
		} else if(l > 1208 && t < 438 && l < 1305){
			self.loseGame();
		} else if((l+20) > 1239 && (t+20) > 468){
			self.loseGame();
		} else if(l >= 1308 && t < 341){
			self.loseGame();
		} else if((l+20) > 1340 && (t+20) > 368){
			self.loseGame();
		}
		if(l > 1480){
			self.passGame();
		}

		// vong lap
		setTimeout(self.loop, self.timeFrame);
	}

	this.runtime = function(){
		sotime--;
		time.innerText = sotime;
		// tiktak.play();
		setTimeout(self.runtime, 1000);
	}

	this.checkWinner = function(){
		axios.get('https://61694b6f09e030001712c272.mockapi.io/earnWinner')
  		.then(function (response) {
    		// handle success
    		console.log(response.data.length);
    		if(response.data.length > currentWinner){
    			alert('Ôi vừa có người về đích trước rồi, chơi lại nhé, +1 quà');
    			window.location = 'mecungGame2.php';
    			document.onmouseup();
    		}
  		})
  		.catch(function (error) {
    		// handle error
    		console.log(error);
  		});
		setTimeout(self.checkWinner, self.timeCheck);
	}

	this.loseGame = function(){
		document.onmouseup();
		moveElm.offsetLeft = 2;
		moveElm.offsetTop = 2;
		alert('Lại thua rùi, chơi lại');
		window.location = 'mecungGame2.php';
	}

	this.passGame = function(){
	   	document.onmouseup();
	   	clap.play();
	   	document.getElementById("gameOverBoard").style.display = "block";
		document.getElementById("pass").style.display = 'block';
		document.getElementById("passButton").style.display = 'block';
		let username = document.getElementsByTagName('h2')[0].innerText;
	}
}

var g = new game();
g.init();