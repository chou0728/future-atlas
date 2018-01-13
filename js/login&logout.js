window.onload = function(){
	// 判斷登入 或 登出
	var logIO_panel = document.getElementsByClassName("login")[0];
	var login_status = logIO_panel.innerHTML.trim();
	if(login_status = "登出"){
		logIO_panel.parentElement.href = "logoutheadforindex.php";
	}else{
		logIO_panel.parentElement.href = "google.com.tw";
	}	
}