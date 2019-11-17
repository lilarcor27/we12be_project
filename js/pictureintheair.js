// Picture In the AIR

(function() {
	const mainboardElem = document.querySelector("#mainboard");
	function PictureintheAir(boardname) {
		this.pita = document.querySelector(boardname + " .picture_in_the_air");
		this.pita_pics = document.querySelectorAll(boardname + " .pita");
		this.init = function() {
			const self_pita_pos = (this.pita.getBoundingClientRect().top + this.pita.getBoundingClientRect().bottom) / 2;
			const self_pita_pos_adjusted = (self_pita_pos - (window.innerHeight / 2)) / (window.innerHeight / 2);
			if(!self_pita_pos) return;
			let i = 0;
			for(; i < this.pita_pics.length; i++) {
				let range = self_pita_pos_adjusted * 40;
				range *= this.pita_pics[i].getAttribute("data-picspeed");
				this.pita_pics[i].style.transform = "translateY(" + range + "%)";
			}
		};
	}
	
	const board22 = new PictureintheAir("#board22");
	
	const b22text2 = document.querySelector("#b22text2");
	const b22text4 = document.querySelector("#b22text4");
	
	window.addEventListener("scroll", function() {
		const currentBoardNum = mainboardElem.getAttribute("data-currentboard");
		if(currentBoardNum == 2) {
			board22.init();
		}
	});
})();