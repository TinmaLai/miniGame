var color = null;


var food = function(game, row, col){
	this.game = game;
	this.col = col;
	this.row = row;

	this.init = function(){
		
	}

	this.draw = function(){
		// var col = Math.round(Math.random() * (NUM_COLS - 1)) + 10;
		// var row = Math.round(Math.random() * (NUM_ROWS - 1));
		color = Math.round(Math.random() * 4);
		switch(color){
			case 0:{
				// tiengcuoi.play();
				this.game.context.fillStyle = "#191dff";
				this.game.context.fillRect(this.col * 20, this.row *20, 30,30); // xanh
				
				break;
			}
			case 1:{
				// tiengcuoi.play();
				this.game.context.fillStyle = "red";
				this.game.context.fillRect(this.col * 20, this.row *20, 30,30); // do
			
				break;
			}
			case 2:{
				// tiengcuoi.play();
				// this.game.context.drawImage(lien, this.col * 20, this.row *20, 30,30); // tim
				this.game.context.fillStyle = "purple";
				this.game.context.fillRect(this.col * 20, this.row *20, 30,30);
				
				break;
			}
			case 3:{
				// tiengcuoi.play();
				// this.game.context.drawImage(dieu, this.col * 20, this.row *20, 30,30); // vang
				this.game.context.fillStyle = "yellow";
				this.game.context.fillRect(this.col * 20, this.row *20, 30,30);
				
				break;
			}
			case 4:{
				// tiengcuoi.play();
				// this.game.context.drawImage(hao, this.col * 20, this.row * 20, 30,30); // den
				this.game.context.fillStyle = "black";
				this.game.context.fillRect(this.col * 20, this.row *20, 30,30);
				
				break;
			}
		}
		// this.game.context.fillRect( this.col * FOOD_SIZE, this.row * FOOD_SIZE, FOOD_SIZE, FOOD_SIZE );
		
	}
}