window.onload = function(){
	f_box = document.getElementsByClassName('f_box');
	for(i=0;i<f_box.length;i++){
		f_box[i].addEventListener("click",openIframe);
	}
	i_info = document.getElementsByClassName('i_info');
	for(a=0;a<i_info.length;a++){
		i_info[a].addEventListener("click",category);
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

function category(){
	var f_box = document.getElementsByClassName('f_box');
	var cate = this.dataset.category;
	var f_cate = [];
	for(var j = 0; j<f_box.length;j++ ){
		f_box[j].style.display = "";
		f_cate[j]=f_box[j].dataset.category;
		if(f_cate[j].indexOf(cate)==-1&&cate!=5){
			f_box[j].style.display = "none";
		}else if(cate == 5){
			f_box[j].style.display = "";
		}
	}
	
	
}