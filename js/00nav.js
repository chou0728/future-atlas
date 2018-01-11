
//-導覽列RWD-----------------------------------
//-導覽列RWD-----------------------------------
			function navOpen(){
				var headerOpenBtn = document.getElementsByClassName("headerOpenBtn")[0];
				headerOpenBtn.addEventListener("click",headerAppearClose);
				

				var navOpenBtn = document.getElementsByClassName("navOpenBtn")[0];
				navOpenBtn.addEventListener("click",navAppearClose);
				

				var logoBtn = document.getElementsByClassName("logo")[0];
				logoBtn.addEventListener("click",allNavClose);
				
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
				for( i = 1; i < 7; i++){
	            if(storage.getItem(i) != null){
	                if(storage.getItem(i).split("/")[1] != 0 || storage.getItem(i).split("/")[3] != 0){
	                    facility_ticket_list += i+"/";
	                }storage.setItem("facility_ticket_list", facility_ticket_list);
	            }
	        }
				var facility_ticket_list = storage.getItem("facility_ticket_list");
		        var iniCart = Math.floor((facility_ticket_list.split("/").length-1)/2);
		        var aa = document.getElementById("cartimgid").src.substr(-5,1);
		        aa = iniCart;
		        document.getElementById("cartimgid").src = "img/cart/wallet_"+iniCart+".png";
		        document.getElementById("howmanytickets").innerHTML = facility_ticket_list.split("/").length-1;
			}
			window.addEventListener('load',iniCart);
			window.addEventListener('load',navOpen);
			window.addEventListener('resize',allNavClose);
