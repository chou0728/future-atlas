window.onload = function(){


    checkRateOrNot();
    

    function checkRateOrNot(){

        var rate_faci = document.getElementsByClassName('rate_faci');

        for (let i = 0; i < rate_faci.length; i++){

            var comment_status = rate_faci[i].getAttribute('data-comment-status');
            

            if(comment_status==0){//尚未評價

                
                rate_faci[i].addEventListener('click',function(){ //click後連結至評價頁

                    let order_no = this.getAttribute('data-order-no');
                    let facility_no = this.getAttribute('data-facility-no');
                    window.location  = "rate_facility.php?order_no="+ order_no + "&facility_no="+ facility_no;
                    
                });


            }else{//已評價
                rate_faci[i].innerHTML = "已評價";
                rate_faci[i].addEventListener('click',function(){ //click後連結至評價頁
                   alert("您已評價過");
                })
            }


        }

    }

};






