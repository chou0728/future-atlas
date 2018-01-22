window.onload = function(){
	i_info = document.getElementsByClassName('i_info');
	for(a=0;a<i_info.length;a++){
		i_info[a].addEventListener("click",category);
	}
	var goComment = document.getElementById('goComment');
	 goComment.addEventListener('click',goCommentCheck);
}



function goCommentCheck(){
	var storage = localStorage;
	var mem_id = storage.getItem("mem_id");
	var facility_no = this.dataset.facilityNo;
	window.location = "facilityInfo_go_comment_check.php?mem_id="+mem_id+"&facility_no="+facility_no;
    	

}


  
function closelightBoxF(){
	var body = document.getElementsByTagName("body")[0];
	var close = document.getElementById('close');
	lightBoxF.style.height = "0";
	lightBoxF.style.opacity = "0";
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
