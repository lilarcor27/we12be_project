// Language | call from php

function checkLanguage(lang) {
	let lang_texts;
	if(lang === "kor") {
		if(document.querySelector('.header_lang_child:nth-child(2)') != null)
			document.querySelector('.header_lang_child:nth-child(2)').classList.add('selected');
		document.documentElement.lang = 'kr';
		lang_texts = document.querySelectorAll('.lang_kr');
	} else {
		if(document.querySelector('.header_lang_child:nth-child(1)') != null)
			document.querySelector('.header_lang_child:nth-child(1)').classList.add('selected');
		document.documentElement.lang = 'en';
		lang_texts = document.querySelectorAll('.lang_en');
	}
	for(let i = 0; i < lang_texts.length; i++) 
		lang_texts[i].classList.add('selected');
	
}