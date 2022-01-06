const GAME_WIDTH = 1500;
const GAME_HEIGHT = 700;

var game = function(){
	this.timeFrame = 100;
	this.timeCheck = 5000;
	this.way = null;
	this.canvas = null;
	this.context = null; 

	var self = this;
	var moveElm = document.getElementById('moveElement');
	var sotime = 20;
	var time = document.getElementById('time');
	var currentWinner = null;
	var tiktak = document.getElementsByTagName('audio')[0];
	moveElm.offsetLeft = 0;
	moveElm.offsetTop = 0;
	

	
	this.init = function(){
		// create game canvas 
		this.canvas = document.createElement('canvas');
		this.context = this.canvas.getContext('2d');
		this.canvas.width = GAME_WIDTH;
		this.canvas.height = GAME_HEIGHT;
		document.body.appendChild(this.canvas);
		// get winner current1
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
		this.loop();
	}

	this.loop = function(){
		//create way
		self.way = new way(self);
		self.way.init();	
		self.way.draw();	

		// check lose game
		var l = moveElm.offsetLeft;
	    var t = moveElm.offsetTop;

		if(l < 508 && (t+20) > 58){
			self.loseGame();
		} else if(l >= 508 && (t+20) > 558){
			self.loseGame();
		} else if((l+20) >= 558 && t < 508 && l <= 1008){
			self.loseGame();
		} else if(l <= 558 && t < 8){
			self.loseGame();
		} else if(l > 1008 && t < 108){
			self.loseGame();
		} else if((l+20) > 1058 && (t+20) > 158 && l < 1308){
			self.loseGame();
		} else if((l+20) > 1358 && t < 458){
			self.loseGame();
		} else if(l > 1308 && (t+20) > 508){
			self.loseGame();
		}
		if(l > 1470 && t >= 458 && t <= 508){
			self.passGame();
		}

		// vong lap
		
		setTimeout(self.loop, self.timeFrame);
	}

	this.runtime = function(){
		sotime--;
		time.innerText = sotime;
		tiktak.play();
		setTimeout(self.runtime, 1000);
	}

	this.checkWinner = function(){
		axios.get('https://61694b6f09e030001712c272.mockapi.io/earnWinner')
  		.then(function (response) {
    		// handle success
    		console.log(response.data.length);
    		if(response.data.length > currentWinner){
    			alert('Ôi vừa có người về đích trước rồi, chơi lại nhé, +1 quà');
    			window.location = 'mecungGame.php';
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
		alert('Thua rùi, chơi lại');
		window.location = 'mecungGame.php';
	}

	this.passGame = function(){
	    document.onmouseup();
		window.location = 'mecungGame2.php';
	}
}

var g = new game();
g.init();