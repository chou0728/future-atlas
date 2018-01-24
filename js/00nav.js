
function MapNavinit(){//園區地圖nav指示
	nav_here = document.getElementById("nav_here");
	nav_here.onclick = MapNavColor;
	if(location.hash == "#page2"){
		nav_here.children[1].style.color = "rgb(55,222,255)";
		nav_here.children[1].style.fontWeight = "900";
		nav_here.children[0].src="img/hover-tri-now.png";
		nav_here.children[0].className="nav_here";
	}
	document.addEventListener('mousewheel',MapNavColorOff);
}
function MapNavColor(){
	nav_here.children[1].style.color = "rgb(55,222,255)";
	nav_here.children[1].style.fontWeight = "900";
	nav_here.children[0].src="img/hover-tri-now.png";
	nav_here.children[0].className="nav_here";

}
function MapNavColorOff(){
	if(location.hash == "#page2"){
		nav_here.children[1].style.color = "rgb(55,222,255)";
		nav_here.children[1].style.fontWeight = "900";
		nav_here.children[0].src="img/hover-tri-now.png";
		nav_here.children[0].className="nav_here";
	}else{
		nav_here.children[1].style.color = "";
		nav_here.children[1].style.fontWeight = "";
		nav_here.children[0].src="img/hover-tri.png";
		nav_here.children[0].className="nav_hover";
	}
	
}
window.addEventListener('load',MapNavinit);

//-導覽列RWD-----------------------------------
//-導覽列RWD-----------------------------------
			function navOpen(){
				var headerOpenBtn = document.getElementsByClassName("headerOpenBtn")[0];
				headerOpenBtn.addEventListener("click",headerAppearClose);
				

				var navOpenBtn = document.getElementsByClassName("navOpenBtn")[0];
				navOpenBtn.addEventListener("click",navAppearClose);
				

				var logoBtn = document.getElementsByClassName("logo")[0];
				logoBtn.addEventListener("click",allNavClose);

				NavClose = document.getElementById("NavClose");
				NavClose.addEventListener("click",allNavClose);
				// NavClose.addEventListener("click",MapNavColor);
				
				
			}
			
			function headerAppearClose(){
					var header = document.getElementsByClassName("header")[0];
					var li_top = document.getElementsByClassName("li_top");
					var ul_box = document.getElementsByClassName("ul_box")[0];

					if(ul_box.id =="navAppear" && header.id !="headerAppear"){
						header.setAttribute("id","headerAppear");
						for(var i =0;i<li_top.length;i++){
							li_top[i].setAttribute("id","liAppear");
						}
						ul_box.id="";

					}else if(header.id !="headerAppear"&&header.id !="navAppear"){
						header.setAttribute("id","headerAppear");
						for(var i =0;i<li_top.length;i++){
							li_top[i].setAttribute("id","liAppear");
						}
					}else{
						header.id="";
						for(var i =0;i<li_top.length;i++){
							li_top[i].id="";
						}

					

					
					}	
			}
			function navAppearClose(){
				var header = document.getElementsByClassName("header")[0];
				var li_top = document.getElementsByClassName("li_top");
				var ul_box = document.getElementsByClassName("ul_box")[0];
					if(ul_box.id !="navAppear" && header.id !="headerAppear"){
						ul_box.setAttribute("id","navAppear");
						
					}else if(ul_box.id !="navAppear" && header.id =="headerAppear"){
						ul_box.setAttribute("id","navAppear");
						header.id="";
						for(var i =0;i<li_top.length;i++){
							li_top[i].id="";
						}

					}else{
						ul_box.id="";

					}
			}
			function allNavClose(){
				var header = document.getElementsByClassName("header")[0];
				var li_top = document.getElementsByClassName("li_top");
				var ul_box = document.getElementsByClassName("ul_box")[0];
						for(var i =0;i<li_top.length;i++){
							li_top[i].id="";
						}
						ul_box.id="";
						header.id="";

			}

			// 原始購物車外觀
			function iniCart(){
				var storage = localStorage;
				var facility_ticket_list = storage.getItem("facility_ticket_list");
				if(facility_ticket_list != null){
		        	var iniCart = Math.floor((facility_ticket_list.split("/").length-1)/2);
		        	var aa = document.getElementById("cartimgid").src.substr(-5,1);
		        	aa = iniCart;
			        document.getElementById("cartimgid").src = "img/cart/wallet_"+iniCart+".png";
			        document.getElementById("howmanytickets").innerHTML = facility_ticket_list.split("/").length-1;
		        }
			}
			window.addEventListener('load',iniCart);
			window.addEventListener('load',navOpen);
			window.addEventListener('resize',allNavClose);
// 小nav
$(document).ready(function(){
		if($(document).scrollTop() > 50){
			$(".nav").addClass("smallnav");
		}
	$(window).scroll(function(){
		if($(document).scrollTop() > 50){
			$(".nav").addClass("smallnav");
		}else{
			$(".nav").removeClass("smallnav");
		}
	});
});