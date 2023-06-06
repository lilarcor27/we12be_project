(function () {


const mainboardElem = document.querySelector("#mainboard");
const logoElem = document.querySelector("#logo");

const appeardivsinboard1 = document.querySelectorAll("#board1 .divs");
const appeardivsinboard2 = document.querySelectorAll("#board2 .divs");
const Images = [
	document.querySelectorAll("#board1 .images"),
	document.querySelectorAll("#board2 .images"),
	document.querySelectorAll("#board3 .images"),
	document.querySelectorAll("#board4 .images")
];
const Texts = [
	document.querySelectorAll("#board1 .texts"),
	document.querySelectorAll("#board2 .texts"),
	document.querySelectorAll("#board3 .texts"),
	document.querySelectorAll("#board4 .texts")
];
const Divs = [
	document.querySelectorAll("#board1 .divs"),
	document.querySelectorAll("#board2 .divs"),
	document.querySelectorAll("#board3 .divs"),
	document.querySelectorAll("#board4 .divs")
];
const Boards = document.querySelectorAll(".board");

// Board

function Board() {
	this.boardElem = document.querySelectorAll(".board");
	this.board11image1Elem = document.querySelector(".board11 .image1");
	this.targetBoardNum = -1;
	this.prevBoardNum = this.targetBoardNum;
	this.targetBoard = document.querySelector("#board" + this.targetBoardNum);
	this.prevBoard = this.targetBoard;
}
let boardData = new Board();
function changeBoard(elem1, elem2) {
	boardDisappear(elem1);
	setTimeout(function() {
		boardAppear(elem2);
	}, 1000);
}
function boardAppear(elem) {
	if(elem.classList.contains("board_disappear"))
		elem.classList.remove("board_disappear");
	elem.offsetWidth = elem.offsetWidth;
	elem.style.display = "flex"
	elem.classList.add("board_appear");

	setTimeout(boardAppearingAnimation, 1000, boardData.targetBoardNum, true);
}
function boardDisappear(elem) {
	if(elem === -1) return;
	if(elem.classList.contains("board_appear"))
		elem.classList.remove("board_appear");
	elem.offsetWidth = elem.offsetWidth;
	elem.classList.add("board_disappear")
	setTimeout(function() {
		elem.style.display = "none";
		boardAppearingAnimation(boardData.prevBoardNum, false)
	}, 1000);
}
function boardAppearingAnimation(elemNum, isAppear) {
	const prevBoardNum = boardData.prevBoardNum;
	if(isAppear) {
		if(elemNum == 1) {
			appearImage(Images[0][0]);
			setTimeout(function() {
				appearDiv(Texts[0][0]);
			}, 1000);
		} else if(elemNum == 2) {
			appearImage(Images[1][0]);
			setTimeout(function() {
				appearDiv(Texts[1][0]);
			}, 1000);
		} else if(elemNum == 3) {
			appearImage(Images[2][0]);
			setTimeout(function() {
				appearDiv(Texts[2][0]);
			}, 1000);
		} else if(elemNum == 4) {
			appearImage(Images[3][0]);
			setTimeout(function() {
				appearDiv(Texts[3][0]);
			}, 1000);
		}
	} else {
		for(let i = 0; i < Math.max(Images[prevBoardNum - 1].length, Texts[prevBoardNum - 1].length); i++) {
			disappearImage(Images[prevBoardNum - 1][i]);
			disappearDiv(Texts[prevBoardNum - 1][i]);
			disappearDiv(Divs[prevBoardNum - 1][i]);
		}
	}
}

// Board1

function setBlurPicture(person, num) {
	document.querySelector("#onblur_picture").setAttribute("src", "image/" + person + "/" + num + ".jpg");
	document.querySelector("#for_picture_on_blur").setAttribute("data-picnum", num);
	document.querySelector("#for_picture_on_blur").setAttribute("data-person", person);
}

function board1Handler(e) {
	const target = e.target;
	const lang = (document.documentElement.lang == "kr") ? "kor" : "eng";
	if(target.classList.contains("person_name") || target.classList.contains("person_picture")) {
		if(target.parentNode.id == "yeongjae" || target.parentNode.id == "tetsuya") {
			Boards[0].classList.add("blur_appear");
			document.querySelector("#for_picture_on_blur").classList.add("blur_appear");
			setBlurPicture(target.parentNode.id, 1);
		} else {
			boardDisappear(boardData.targetBoard);
			location.href = "person_book.php" + "?pname=" + target.parentNode.getAttribute("id");
		}
	}
}

Boards[0].addEventListener("click", board1Handler);

// blurPic

const LIMIT_OF_PIC = {
	"yeongjae": 14,
	"tetsuya": 21
};

function blurPicHandler(e) {
	const target = e.target;
	if(target.classList.contains("blur_arrow")) {
		var currentPicNum = parseInt(document.querySelector("#for_picture_on_blur").getAttribute("data-picnum"));
		var currentPerson = document.querySelector("#for_picture_on_blur").getAttribute("data-person");

		if(0 < currentPicNum + parseInt(target.getAttribute("value")) && currentPicNum + parseInt(target.getAttribute("value")) <= LIMIT_OF_PIC[currentPerson]) {
			setBlurPicture(currentPerson, currentPicNum + parseInt(target.getAttribute("value")));
			// console.log(currentPicNum + parseInt(target.getAttribute("value")) , LIMIT_OF_PIC[currentPerson])
		}
	} else if(target.id == "onblur_picture") {
		// empty
	} else {
		Boards[0].classList.remove("blur_appear");
		document.querySelector("#for_picture_on_blur").classList.remove("blur_appear");
	}
}

document.querySelector("#for_picture_on_blur").addEventListener("click", blurPicHandler);

// Start Website

function startFromLogo() {
	logoAppear();
//	setTimeout(logoDisappear, 4000);  로딩 만듬.
//	setTimeout(mainboardAppear, 6500);
	window.addEventListener("load", function() {
		setTimeout(logoDisappear, 1000);
		setTimeout(mainboardAppear, 3500);
	});
}

function logoAppear() {
	logoElem.offsetWidth = logoElem.offsetWidth;
	logoElem.classList.add("logo_appear");
}
function logoDisappear() {
	logoElem.offsetWidth = logoElem.offsetWidth;
	logoElem.classList.add("logo_disappear");
}
function mainboardAppear() {
	// 로고 감추기
	logoElem.style.display = "none";
	mainboardElem.style.opacity = "1";

	// 보드데이타 설정
	boardData.prevBoardNum = boardData.targetBoardNum = mainboardElem.getAttribute("data-currentboard");
	boardData.prevBoard = boardData.targetBoard = document.querySelector("#board" + boardData.prevBoardNum);

	hideEveryBoard();
	changeBoard(-1, boardData.targetBoard);
}
function hideEveryBoard() {
	for(let i = 0; i < Boards.length; i++) {
		if(Boards[i] === boardData.targetBoard) continue;
		Boards[i].style.display = "none";
	}
}

// Scroll Handler
const personWrapper = document.querySelectorAll(".person_wrapper");

function scrollHandler(e) {
	let i = 0;
	const windowHeight = window.innerHeight;
	const currentBoardNum = boardData.targetBoardNum;
	if(currentBoardNum == -1) return;
	const maxLength = Math.max(Images[currentBoardNum - 1].length, Texts[currentBoardNum - 1].length, Divs[currentBoardNum - 1].length);

	for(i = 0; i < maxLength; i++) {
		if((Images[currentBoardNum - 1][i])) {
			if(Images[currentBoardNum - 1][i].getBoundingClientRect().top < windowHeight * 0.7)
				appearImage(Images[currentBoardNum - 1][i]);
		}
		if((Texts[currentBoardNum - 1][i])) {
			if(Texts[currentBoardNum - 1][i].getBoundingClientRect().top < windowHeight * 0.7)
				appearDiv(Texts[currentBoardNum - 1][i]);
		}
		if((Divs[currentBoardNum - 1][i])) {
			if(Divs[currentBoardNum - 1][i].getBoundingClientRect().top < windowHeight * 0.7)
				appearDiv(Divs[currentBoardNum - 1][i]);
		}
	}

	if(currentBoardNum == 1) {
		for(i = 0; i < personWrapper.length; i++) {
			const posTop = personWrapper[i].getBoundingClientRect().top;
			if(windowHeight * 0.15 < posTop && posTop < windowHeight * 0.45) {
				personWrapper[i].classList.add("appear_person");
			} else {
				personWrapper[i].classList.remove("appear_person");
			}
		}
	}
}
window.addEventListener("scroll", scrollHandler)

// Header

const headerElem = document.querySelector(".header");
const headerConElem = document.querySelector(".header_list_con");
const headerButtonConElem = document.querySelector(".header_button_con");
let isHeaderOpened = false;
let headerTimer = null;

function headerButtonAnimating(elem) {
	elem.classList.remove("header_button_active");
	if(elem.getAttribute("data-direction") === "open")
		elem.setAttribute("data-direction", "close");
	else
		elem.setAttribute("data-direction", "open");

	// 애니메이션 재동작을 위한 꼼수
	elem.offsetWidth = elem.offsetWidth;
	elem.classList.add("header_button_active");
}
function headerToggle() {
	isHeaderOpened = !isHeaderOpened;
	if(headerTimer)
		clearTimeout(headerTimer), headerTimer = null;
	if(!isHeaderOpened) {
		headerTimer = setTimeout(function () {
			headerConElem.style.display = "none";
		} ,1000);
	} else
		headerConElem.style.display = "flex";

	headerElem.offsetWidth = headerElem.offsetWidth;
	headerElem.classList.toggle("header_opened");
	headerElem.offsetWidth = headerElem.offsetWidth;
	headerButtonAnimating(headerButtonConElem);
}
function headerHandler(e) {
	const target = e.target;

	if(target == headerButtonConElem || target.parentNode == headerButtonConElem)
		return headerToggle();
	if(!isHeaderOpened) return;

	if(target.classList.contains("header_list_page")) {
		const target_num = target.getAttribute("data-num");

		if(!target_num || target_num == boardData.targetBoardNum)
			return headerToggle();

		if(boardData.prevBoardNum == -1) return;

		boardData.prevBoard = boardData.targetBoard;
		boardData.prevBoardNum = boardData.targetBoardNum;
		boardData.targetBoard = document.querySelector("#board" + target_num);
		boardData.targetBoardNum = target_num;
		mainboardElem.setAttribute("data-currentboard", target_num);

		setTimeout(function() {changeBoard(boardData.prevBoard, boardData.targetBoard);}, 1500);
	} else if(target.classList.contains("header_lang_child")) {
		if(!target.classList.contains("selected")) {
			if(target.getAttribute("data-lang") === "eng") {
				location.href = "main.php?lang=eng";
			} else if(target.getAttribute("data-lang") === "kor") {
				location.href = "main.php?lang=kor";
			}
		}
	}
	headerToggle();
}
headerElem.addEventListener("click", headerHandler);

// Initialize

(function init() {
	scrollHandler();
	startFromLogo();
	// mainboardAppear();
})();

// Appear Elements

function appearImage(elem) {
	if(!elem) return;
	elem.offsetWidth = elem.offsetWidth;
	elem.classList.add("appear_image");
}
function appearDiv(elem) {
	if(!elem) return;
	elem.offsetWidth = elem.offsetWidth;
	elem.classList.add("appear_div");
}
function disappearImage(elem) {
	if(!elem) return;
	elem.offsetWidth = elem.offsetWidth;
	elem.classList.remove("appear_image");
}
function disappearDiv(elem) {
	if(!elem) return;
	elem.offsetWidth = elem.offsetWidth;
	elem.classList.remove("appear_div");
}


})();
