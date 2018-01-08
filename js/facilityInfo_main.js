window.onload = function(){
	f_box = document.getElementsByClassName('f_box');
	for(i=0;i<f_box.length;i++){
		f_box[i].addEventListener("click",openIframe);
	}
	
}

function openIframe(){
	var body = document.getElementsByTagName("body")[0];
	var iframe = document.getElementsByClassName('facility01')[0];
	var close = document.getElementById('close');
	body.style.overflow = "hidden";
	iframe.style.height = "100vh";
	iframe.style.opacity = "1";
	close.style.display = "block";
	close.onclick = closeIframe;

}

function closeIframe(){
	var body = document.getElementsByTagName("body")[0];
	var iframe = document.getElementsByClassName('facility01')[0];
	var close = document.getElementById('close');
	iframe.style.height = "0";
	iframe.style.opacity = "0";
	close.style.display = "none";
	body.style.overflow = "auto";
}
// function frameColorChange(){
// 	var f_mainphoto = document.getElementsByClassName('f_mainphoto');

// }