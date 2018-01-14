window.onload = function(){
	console.log("00");
	f_box = document.getElementsByClassName('f_box');
	for(i=0;i<f_box.length;i++){
		f_box[i].addEventListener("click",openlightBoxF);
	}
	i_info = document.getElementsByClassName('i_info');
	for(a=0;a<i_info.length;a++){
		i_info[a].addEventListener("click",category);
	}
	
}

function openlightBoxF(){
	no = this.dataset.no;
	var body = document.getElementsByTagName("body")[0];
	lightBoxF = document.getElementsByClassName('facilityBox');
	var close = document.getElementById('close');
	body.style.overflow = "hidden";
	lightBoxF[no].style.height = "100vh";
	lightBoxF[no].style.opacity = "1";
	close.style.display = "block";
	close.onclick = closelightBoxF;

}

function closelightBoxF(){
	var body = document.getElementsByTagName("body")[0];
	var close = document.getElementById('close');
	lightBoxF[no].style.height = "0";
	lightBoxF[no].style.opacity = "0";
	close.style.display = "none";
	body.style.overflow = "auto";
}

function category(){
	for(var a=0;a<i_info.length;a++){
		i_info[a].id="";
	}
	if(this.id!="selected"){
		this.setAttribute("id","selected");
	}
	
	
	f_box = document.getElementsByClassName('f_box');
	cate = this.dataset.category;
	f_cate = [];

	for(var j = 0; j<f_box.length;j++ ){
		f_cate[j]=f_box[j].dataset.category;

		if(f_cate[j].indexOf(cate)==-1&&cate!=5){
				f_box[j].style.opacity="0";
				setTimeout(categoryFinish,300);	
			
			
		}else if(cate == 5){
			f_box[j].style.opacity="0";
			f_box[j].style.display="";
			setTimeout(categoryFinish,300);
			
			
		}
	}

}
function categoryFinish(){

	
	for(var j = 0; j<f_box.length;j++ ){
		f_box[j].style.opacity="1";
		f_box[j].style.display = "";
		if(f_cate[j].indexOf(cate)==-1&&cate!=5){
			f_box[j].style.display="none";

			clearTimeout(categoryFinish);
  			
			
		}else if(cate == 5){
			f_box[j].style.opacity="1";
			clearTimeout(categoryFinish);
			
		}
	}
}
