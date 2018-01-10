$(document).ready(function(){
	$(".f_submit").click(function(){
        // 原始購物車外觀
        var newlevel = Math.floor((facility_ticket_list.split("/").length-1)/2);
        var aa = document.getElementById("cartimgid").src.substr(-5,1);
        aa = newlevel;
        document.getElementById("cartimgid").src = "img/cart/wallet_"+aa+".png";
        document.getElementById("howmanytickets").innerHTML = facility_ticket_list.split("/").length-1;
	        
        // 更新購物車預覽
            $("#showCartContenttb").empty();
            for(var i = 1; i < 7; i++){
                if(storage.getItem(i) != null){
                    var fn = storage.getItem(i).split("/")[1];
                    var hn = storage.getItem(i).split("/")[3];
                    if(fn != 0 || hn != 0){
                    $("#showCartContenttb").append("<tr><td>設施"+i+"全票"+fn+"張 半票"+hn+"張</td></tr>");                    
                }
            }
        }
	});
});