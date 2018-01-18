function back_init(){
	ham = document.getElementById('ham');
	back_nav = document.getElementsByClassName('nav')[0];
	ham.onclick = back_openav;
		
	
}
window.addEventListener('load',back_init);

function back_openav(){
	if(back_nav.id!="nav"){
		ham.src = "img/back_menu.png";
		back_nav.setAttribute('id',"nav");

	}else{
		ham.src = "img/back_menu_default.png";
		back_nav.setAttribute('id',"");
	}
	
}