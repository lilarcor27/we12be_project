(function() {

const boardElem = document.querySelector(".board");
const formDeleteContainerElem = document.querySelector(".form_delete_container");
const progressTextElem = document.querySelectorAll(".progress_text");
const progressBarElem = document.querySelector(".progress_bar");
const progressBarTextElem = document.querySelector(".progress_bar_text");
const pageIndexElem = document.querySelector(".page_index");
const naviElem = document.querySelector(".navi_wrapper");
const helperElem = document.querySelector(".helper");
const loadingElem = document.querySelector(".loading");
const logoElem = document.querySelector("#logo");
let Pages = {
	elem: document.querySelectorAll(".page"),
	currentPage: 1,
	pageIndex: []
};

function setPagenumForPages() {
	for(let i = 0; i < Pages.elem.length; i++) {
		Pages.elem[i].dataset.pagenum = i + 1;
	}
}
function setzIndexforPages() {
	for(let i = 0; i < Pages.elem.length; i++) {
		Pages.pageIndex.push(Pages.elem[i].dataset.pagenum);
		Pages.elem[i].style.zIndex = Pages.elem.length - i;
	}
}

function setInputValue() {
	// document.querySelector("#pname_reply").setAttribute("value", boardElem.getAttribute("id"));  // person 이름 넣기
	// document.querySelector("#pname_delete").setAttribute("value", boardElem.getAttribute("id")); // person 이름 넣기
	document.querySelector("#pname_update").setAttribute("value", boardElem.getAttribute("id")); // person 이름 넣기
	// document.querySelector("#content_id").setAttribute("value", boardElem.getAttribute("data-contentnum"));
}

function setPageIndexGray() {
	for(let i = 0; i < 5; i++) {
		const pTextElem = document.querySelector(".progress_text:nth-child(" + (i + 1) + ")");
		if(pTextElem.dataset.indexnum != 99) continue;

		pTextElem.style.color = "#909090";
	}
}

function setReplyTimeToDate() {
	const replyDateElem = document.querySelectorAll(".reply_date");

	for(let i = 0; i < replyDateElem.length; i++) {
		replyDateElem[i].innerText = new Date(1000*parseInt(replyDateElem[i].innerText));
	}
}

function init() {
	setPagenumForPages();
	setzIndexforPages();
	setInputValue();
	setPageIndexGray();
	setReplyTimeToDate();
	gotoPage(1);
}


function gotoPage(pageNum) {
	if(!(1 <= pageNum && pageNum <= Pages.elem.length)) return;

	turnPage(pageNum);
	checkPage(pageNum);
}

function gotoNextPage() {
	let foo = Pages.currentPage; // bug-fix that hasn't reason
	gotoPage(++foo);
}

function gotoPrevPage() {
	gotoPage(Pages.currentPage - 1);
}

function turnPage(pageNum) {
	if(Pages.currentPage < pageNum) {
		for(let i = Pages.currentPage; i < pageNum; i++) {
			Pages.elem[i - 1].style.transform = "rotateY(-110deg)";
		}
	} else {
		for(let i = pageNum; i < Pages.currentPage; i++) {
			Pages.elem[i - 1].style.transform = "rotateY(0deg)";
		}
	}
	Pages.currentPage = pageNum;
	pageIndexElem.innerText = pageNum;
	document.querySelector("#page_num").setAttribute("value", pageNum);
}

let selectedText = 1;

function checkPage(pageNum) {
	let foo = 0;

	document.querySelector(".progress_text:nth-child(" + selectedText + ")").classList.remove("selected");

	for(let i = 0; i < progressTextElem.length; i++) {
		if(pageNum >= progressTextElem[i].dataset.indexnum)
			foo = i;
	}
	selectedText = foo + 1;
	document.querySelector(".progress_text:nth-child(" + selectedText + ")").classList.add("selected");

	let pagePer = (selectedText - 1) * 25;
/*
	if(pageNum <= document.querySelector(progress_text:nth-child(2)).dataset.indexnum)
		pagePer = 0;
	else if(pageNum >= document.querySelector(progress_text:nth-child(5)).dataset.indexnum)
		pagePer = 100;
	else
		pagePer = ((pageNum - 2) * 100) / (Pages.elem.length - 3);
*/
	progressBarElem.style.width = pagePer + "%";
}

let xFirst = null;
let yFirst = null;

function touchStartHandler(e) {
	const firstTouch = e.touches[0];
	xFirst = firstTouch.clientX;
	yFirst = firstTouch.clientY;

	disableHelper();
}

function touchMoveHandler(e) {
	if(!(xFirst * yFirst)) return;

	let xLast = e.touches[0].clientX;
	let yLast = e.touches[0].clientY;

	let xDiff = xLast - xFirst;
	let yDiff = yLast - yFirst;

	if(Math.abs(xDiff) > Math.abs(yDiff)) { // 가로축 방향
		if(xDiff > 0) { // 우측
			gotoPrevPage();
			foldPage(true);
		} else { // 좌측
			gotoNextPage();
			foldPage(true);
		}
	} else { // 세로축 방향
		if(yDiff > 0) {
			foldPage(true);
		} else {
			foldPage(false);
		}
	}

	xFirst = yFirst = null;
}

function foldPage(val) {
	if(val) {
		document.querySelector(".progress_wrapper").classList.remove("fold");
		// document.querySelector(".page_wrapper").classList.remove("fold");
	} else {
		document.querySelector(".progress_wrapper").classList.add("fold");
		// document.querySelector(".page_wrapper").classList.add("fold");
	}
}

function disableHelper() {
	helperElem.style.display = "none";
}

const progressTracker = document.querySelector(".progress_bar_tracker");
function progressBarTimer() {
	progressBarTextElem.innerText = Math.round(progressTracker.offsetLeft * 100 / window.innerWidth);
	requestAnimationFrame(progressBarTimer);
}

requestAnimationFrame(progressBarTimer);

function pageClickHandler(evt) {
	const target = evt.target;
	if(target.classList.contains("reply_delete")) {
		const replyDeleteElem = document.querySelectorAll(".reply_delete");
		for(let i = 0; i < replyDeleteElem.length; i++) {
			if(target != replyDeleteElem[i])
				continue;

			document.querySelector(".form_delete_container").dataset.replynum = replyDeleteElem[i].parentNode.getAttribute("data-replynum");

			formDeleteContainerElem.classList.add("appear");
		}
	} else if(target.classList.contains("form_delete_cancel")) {
		document.querySelector(".form_delete_container").classList.remove("appear");
	} else if(target.classList.contains("form_update_cancel")) {
		document.querySelector(".form_update_container").classList.remove("appear");
	} else if(target.classList.contains("progress_text")) {
		let clickedPage = (target.dataset.indexnum != 99) ? target.dataset.indexnum : 0;
		if(clickedPage)
			gotoPage(document.querySelector(".page:nth-child(" + target.dataset.indexnum + ")").dataset.pagenum);
	}
}

boardElem.addEventListener("click", pageClickHandler);

document.addEventListener("touchstart", touchStartHandler);
document.addEventListener("touchmove", touchMoveHandler);
init();

let accessUpdateCount = 0;
function logoClickHandler() {
	accessUpdateCount++;
	if(accessUpdateCount == 10) {
		appearUpdateAccess();
	}
}
function appearUpdateAccess() {
	document.querySelector(".form_update_container").classList.add("appear");
}
logoElem.addEventListener("click", logoClickHandler);

window.addEventListener("load", function(){
	disableLoading();
});

function disableLoading() {
	loadingElem.classList.add("disable");
	setTimeout(function() {
		loadingElem.style.display = "none";
	}, 1000);
}


function naviWrapperHandler(e) {
	const target = e.target;

	if(target.classList.contains("navi_button")) {
		if(target.classList.contains("navi_forward")) {
			gotoNextPage();
			foldPage(true);
		} else {
			gotoPrevPage();
			foldPage(true);
		}
	}
}

naviElem.addEventListener("click", naviWrapperHandler);
helperElem.addEventListener("click", function() {
	disableHelper();
});

})();
