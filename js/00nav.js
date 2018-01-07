
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
			window.addEventListener('load',navOpen);
			window.addEventListener('resize',allNavClose);
