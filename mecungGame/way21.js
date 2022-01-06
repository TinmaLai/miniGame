


var way = function(game){

	this.game = game;

	this.init = function(){


	}

	this.draw = function(){
		this.game.context.fillStyle = "#000000";
		// doan 1
		this.game.context.fillRect(0,0, 500, 50);
		// doan 2
		this.game.context.fillRect(500,0, 50, 500);
		// doan 3
		this.game.context.fillRect(500,500, 500, 50)
		// doan 4
		this.game.context.fillRect(1000, 550, 50, -400);
		// doan 5
		this.game.context.fillRect(1000, 550, 50, -400);
		//doan 6
		this.game.context.fillRect(1000, 150, 300, -50);
		//doan 7
		this.game.context.fillRect(1300, 100, 50, 350);
		//doan 8
		this.game.context.fillRect(1300, 450, 200, 50);
	}
}