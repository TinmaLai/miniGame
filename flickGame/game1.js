const NUM_COLS = 40;
const NUM_ROWS = 25;
const GAME_WIDTH = 1500;
const GAME_HEIGHT = 700;
const FOOD_SIZE = 20;


var game = function(){
	this.timeFrame = 1000;
	this.food = null;
	this.canvas = null;
	this.context = null;
	this.timeCheck = 7000;

	var self = this;
	var xClick = 0;
	var yClick = 0;
	var col = null;
	var row = null;
	var scoreXanh = 0;
	var scoreDo = 0;
	var scoreTim = 0;
	var scoreVang = 0;
	var scoreDen = 0;
	var currentWinner = null;
	var eat = document.getElementsByTagName('audio')[0];
	var clap = document.getElementsByTagName('audio')[1];

	this.init = function(){
		// create game canvas 
		this.canvas = document.createElement('canvas');
		this.context = this.canvas.getContext('2d');
		this.canvas.width = GAME_WIDTH;
		this.canvas.height = GAME_HEIGHT;
		document.body.appendChild(this.canvas);
		//catch event click to compare with food
		
		document.body.addEventListener('click',function(){
			xClick = event.clientX;
			yClick = event.clientY;
			
			self.eat(xClick, yClick);
		})
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
		//Start the world
		this.checkWinner(); 
		this.loop();
	}

	this.loop = function(){
		// create new image to eat
		col = Math.round(Math.random() * (NUM_COLS - 1)) + 10;
		row = Math.round(Math.random() * (NUM_ROWS - 1));
		self.clearScreen();
		self.food = new food(self, row, col);
		self.food.init();	
		self.food.draw();	
		console.log('loop');

		// vong lap
		setTimeout(self.loop, self.timeFrame);
	}

	this.checkWinner = function(){
		axios.get('https://61694b6f09e030001712c272.mockapi.io/earnWinner')
  		.then(function (response) {
    		// handle success
    		console.log(response.data.length);
    		if(response.data.length > currentWinner){
    			self.clearScreen();
    			self.loseGame();
    		}
  		})
  		.catch(function (error) {
    		// handle error
    		console.log(error);
  		});
		setTimeout(self.checkWinner, self.timeCheck);
	}

	this.eat = function(xClick, yClick){
		console.log('Thuc an: ' + col*FOOD_SIZE+ '-' + row*FOOD_SIZE);
		console.log('Diem nhan: ' + xClick + '-' + yClick);
		if((xClick >= (col*FOOD_SIZE+8) && xClick <= (col*FOOD_SIZE + 30)) && (yClick >= (row*FOOD_SIZE+8) && yClick <= (row*FOOD_SIZE + 30))){
			self.scoreHandle(color);
			self.clearScreen();
			if(scoreXanh == 5 && scoreDo == 5 && scoreTim == 5 && scoreVang == 5 && scoreDen == 5){
				clap.play();
				self.clearScreen();
				self.passGame();
			}
		}
	}

	this.scoreHandle = function(color){
		var scoreXanhEle = document.getElementById('scoreXanh');
		var scoreDoEle = document.getElementById('scoreDo');
		var scoreTimEle = document.getElementById('scoreTim');
		var scoreVangEle = document.getElementById('scoreVang');
		var scoreDenEle = document.getElementById('scoreDen');

		eat.play();
		switch(color){
			case 0:{
				if(scoreXanh >= 5){
					scoreXanh--;
				} else {
					scoreXanh++;
				}
				scoreXanhEle.innerText = scoreXanh;
				break;
			}
			case 1:{
				if(scoreDo >= 5){
					scoreDo--;
				} else {
					scoreDo++;
				}
				scoreDoEle.innerText = scoreDo;
				break;
			}
			case 2:{
				if(scoreTim >= 5){
					scoreTim--;
				} else {
					scoreTim++;
				}
				scoreTimEle.innerText = scoreTim;
				break;
			}
			case 3:{
				if(scoreVang >= 5){
					scoreVang--;
				} else {
					scoreVang++;
				}
				scoreVangEle.innerText = scoreVang;
				break;
			}
			case 4:{
				if(scoreDen >= 5){
					scoreDen--;
				} else {
					scoreDen++;
				}
				scoreDenEle.innerText = scoreDen;
				break;
			}
		}
		
		
	}

	this.clearScreen = function(){
		this.context.fillStyle = '#FFFFFF';
		this.context.fillRect(200, 0, GAME_WIDTH, GAME_HEIGHT);
	}

	this.loseGame = function(){
		document.getElementById("gameOverBoard").style.display = "block";
		document.getElementById("lose").style.display = 'block';
		document.getElementById("loseButton").style.display = 'block';
		// window.location = "./../index.php";
	}
	this.passGame = function(){
		document.getElementById("gameOverBoard").style.display = "block";
		document.getElementById("pass").style.display = 'block';
		document.getElementById("passButton").style.display = 'block';
		let username = document.getElementsByTagName('h1')[0].innerText;
	}

}

	var g = new game();
	g.init();