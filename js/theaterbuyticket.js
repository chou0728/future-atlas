
function doFirst(){
	//先跟HTML畫面產生關聯(尋找物件)，再建事件聆聽的功能
	var canvas = document.getElementById('canvas');
  var context = canvas.getContext('2d');

  context.strokeStyle = '#35ffba';
  context.lineWidth = 5;

  context.beginPath();
  context.moveTo(62,20); 
  context.lineTo(200,20);
  context.lineTo(250,80);
  context.lineTo(250,190);
  context.stroke();
}

window.addEventListener('load',doFirst);

//小導覽列切換
$(document).ready(function(){
	$('.Recycle_arrows').click(function(){ 
    // 按下循環按鈕後，"節目介紹"直接移上來，"購買票劵"往下移
		$('.sq-one').toggleClass("move");
		$('.sq-two').toggleClass("move");
    //延遲一秒後才會跳到TheaterInfo.html
		setTimeout(function(){
			window.location.href = 'TheaterInfo.php';
		},300); 
	}); 
});

// programoneline 和 programtwospan、spaceship 的變化
$(document).ready(function(){
    $(document).scroll(function(){
        var scroll_value = $(document).scrollTop();
        // programoneline
        if (scroll_value>40) {
          $('#programoneline').css({
            height: '15%'
          },1000)
        }

        if (scroll_value>80) {
          $('#programoneline').css({
            height: '20%'
          }, 1000)
        }
        if (scroll_value>100) {
          $('#programoneline').css({
            height: '30%'
          }, 1500)
        }
        if (scroll_value>110) {
          $('#programoneline').css({
            height: '40%'
          }, 1500)
        }
        if (scroll_value>120) {
          $('#programoneline').css({
            height: '60%'
          },2000)
        }

        // spaceship
         if (scroll_value>140) {
          $('#spaceship').animate({
          	left: '-40%'
          },1500)
        }

        // programtwospan
        if (scroll_value>490) {
          $('#programtwospan').css({
            height: '30%'
          }, 500)
        }
        if (scroll_value>520) {
          $('#programtwospan').css({
            height: '50%'
          }, 500)
        }
        if (scroll_value>540) {
          $('#programtwospan').css({
            height: '70%'
          }, 500)
        }
        if (scroll_value>580) {
          $('#programtwospan').css({
            height: '180%'
          }, 500)
        }
        if (scroll_value>640) {
          $('#programtwospan').css({
            height: '300%'
          }, 500)
        }
    });
});

    //判斷是否有登入
    //var loginFlag = false;
    function checkLogin(){
      var storage = localStorage;
      
        if(storage.getItem("mem_id") > 0){
            window.location.href='buyTTicket.php';
            //比較剩餘張數跟使用者輸入張數
        }else{
            //登入頁面
            //-登入-----------------------------------

        // var storage = localStorage;
        /*註冊登入按鈕*/
        var singUpBtn = document.getElementById('singUpBtn');

        /*註冊燈箱*/
        var lightBox = document.getElementById('lightBox');

        /*註冊燈箱關閉按鈕*/
        var cancel = document.getElementById('cancel');

        /*建立登入按鈕點擊事件聆聽功能*/
        singUpBtn.addEventListener('click', showLogin, false);



        /*建立關閉登入燈箱按鈕點擊事件聆聽功能*/
        cancel.addEventListener('click', closeLogin, false);

        showLogin();
        /*點案登入show出登入燈箱 以及判斷登出按鈕*/
        function showLogin() {
          console.log(singUpBtn.innerText);
          /*如果singUpBtn為登入時*/
          fullCover = document.getElementById('all-page');/*叫出燈箱時的墊背*/
          if(singUpBtn.innerText.indexOf("登入") != -1){
            /*show出燈箱*/
            lightBox.style.opacity = 1;
            fullCover.style.display="block";
            lightBox.style.visibility = 'visible'
            lightBox.style.display = "block";
            allNavClose();
          }else if(loginFlag == false){

          }
        }
        


        /*點案登入關閉登入燈箱*/
        function closeLogin() {
          lightBox.style.opacity = 0;
          lightBox.style.visibility = 'hidden';
          fullCover.style.display="";
        }
        
        
      }
            //window.location.href='http://www.cwb.gov.tw/V7/index.htm';
    }