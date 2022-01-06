


var way = function(game){

	this.game = game;

	this.init = function(){


	}

	this.draw = function(){
		this.game.context.fillStyle = "#000000";
		// doan 1
		this.game.context.fillRect(0,0,32,500);
		this.game.context.fillRect(0,500,300,32);
		this.game.context.fillRect(300,532,32,-300);
		this.game.context.fillRect(300,232,100,-32);
		this.game.context.fillRect(400,232,32,-100);
		this.game.context.fillRect(400,132,100,-32);
		this.game.context.fillRect(500,100,32,200);
		this.game.context.fillRect(500,300,200,32);
		this.game.context.fillRect(700,300,32,200);
		this.game.context.fillRect(700,500,500,32);
		this.game.context.fillRect(1200,532,30,-100);
		this.game.context.fillRect(1200,432,100,28);
		this.game.context.fillRect(1300,460,30,-100);
		this.game.context.fillRect(1300,360,200,-27);
		// this.game.context.fillRect(0,0,32,500);
	}
}