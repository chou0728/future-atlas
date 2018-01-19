
window.addEventListener('load',function(){


    var more_info = document.getElementsByClassName('more_info');
    var more_info_theater = document.getElementsByClassName('more_info_theater');
    var rate_faci = document.getElementsByClassName('rate_faci');

    for (let i = 0; i < more_info.length; i++) {

        more_info[i].addEventListener('click',getFacilityInfoToCookie);
        
        rate_faci[i].addEventListener('click',getFacilityInfoToCookie);

        function getFacilityInfoToCookie(){
             var order_no = this.getAttribute('data-order-no');
             var facility_no = this.getAttribute('data-facility-no');
             var mem_id = localStorage.getItem('mem_id');
             document.cookie = "order_no=" + order_no;
             document.cookie = "facility_no=" + facility_no;
             document.cookie = "mem_id=" + mem_id;
        }
        

    }

    for (let a = 0; a < more_info_theater.length; a++) {

        more_info_theater[a].addEventListener('click',getTheaterInfoToCookie);

        function getTheaterInfoToCookie(){
            var theater_ticket_no = this.getAttribute('data-theater-ticket-no');
            var session_no = this.getAttribute('data-session-no');
            var program_no = this.getAttribute('data-program-no');
            var mem_id = localStorage.getItem('mem_id');
            document.cookie = "theater_ticket_no=" + theater_ticket_no;
            document.cookie = "session_no=" + session_no;
            document.cookie = "program_no=" + program_no;
            document.cookie = "mem_id=" + mem_id;
       }
    }




// ================================= 舊的 ===========================================

//     var tickets_area = document.getElementsByClassName('tickets_area');
//     var tickets = document.getElementsByClassName('tickets');
//     var QR_code = document.getElementsByClassName('QR_code');
//     var ticket_info = document.getElementsByClassName('ticket_info');
//     var faci_name = document.getElementsByClassName('faci_name');
//     var date = document.getElementsByClassName('date');
//     var order_num = document.getElementsByClassName('order_num');
//     var unused = document.getElementsByClassName('unused');
//     var used = document.getElementsByClassName('used');
//     var button_area = document.getElementsByClassName('button_area');
//     var more_info = document.getElementsByClassName('more_info');
//     var rate_faci = document.getElementsByClassName('rate_faci');


//     //抓取localstorage的mem_id (會員登入之後)
//     localStorage.setItem('mem_id',1);
//     var mem_id = localStorage.getItem('mem_id');
//     console.log("mem_id:" + mem_id);
    

//     //用mem_id去facility_order資料表中抓order_no   SELECT * FROM `facility_order` WHERE member_id = 1;
//     getFacilityOrderNo();
//     function getFacilityOrderNo(){
//         var xhr = new XMLHttpRequest();

//         xhr.onload = function (){

//             if (xhr.status == 200){
//                 var facility_order_item = JSON.parse(xhr.responseText);
//                 var order_no = facility_order_item.order_no;
//                 localStorage.setItem('order_no',order_no);
//                 console.log("order_no:" + order_no);
//             }else{
//                 alert(xhr.status);
//             }

//         }
//         var determine = 'getFacilityOrderNo';
//         var url = "fetch_from(facility_order).php?mem_id=" + mem_id + "&determine=" + determine;
//          xhr.open("Get", url, true);
//          xhr.send();
//     }

//     //用order_no去facility_order_item資料表中抓facility_no
//     getFacilityNo();
//     function getFacilityNo(){
//         var xhr = new XMLHttpRequest();

//         xhr.onload = function (){

//             if (xhr.status == 200){
//                 var facility_no = xhr.responseText.trim();
//                 localStorage.setItem('facility_no',facility_no);
//                 console.log("facility_no:" + facility_no);
//             }else{
//                 alert(xhr.status);
//             }

//         }
//         var determine = 'getFacilityNo';
//         var order_no = localStorage.getItem('order_no');
//         var url = "fetch_from(facility_order_item).php?order_no=" + order_no + "&determine=" + determine;
//          xhr.open("Get", url, true);
//          xhr.send();
//     }

//     //用order_no到facility_order_item資料表中抓有同樣的order_no有幾筆資料(這樣就可以知道有幾個設施，也就是有幾個QR code)

//     getHowManyFacility();

//     function getHowManyFacility(){

//         var xhr = new XMLHttpRequest();

//         xhr.onload = function (){

//             if (xhr.status == 200){
//                 var QR_amount = parseInt(xhr.responseText); 
//                 console.log("QR_amount_facility:"+QR_amount);
//                 localStorage.setItem('QR_amount_facility',QR_amount);

//             }else{
//                 alert(xhr.status);
//             }

//         }
//         var determine = 'getHowManyFacility';
//         var order_no = localStorage.getItem('order_no');
//         var url = "fetch_from(facility_order_item).php?order_no=" + order_no + "&determine=" + determine;
//          xhr.open("Get", url, true);
//          xhr.send();
//     }

//     //依照QR_amount產生div
//     createFacilityTickets();
//     function createFacilityTickets(){
       
//         var QR_amount_facility = localStorage.getItem('QR_amount_facility');
//         //facility_order_item資料表中有幾筆就create幾個出來
//         for (let i = 0; i < QR_amount_facility; i++) {

            
//             var div_tickets = document.createElement('div');
//             div_tickets.setAttribute('class', 'tickets');
//             tickets_area[0].insertBefore(div_tickets, tickets_area[0].children[1]);

//             var img_QR_code = document.createElement('img');
//             img_QR_code.setAttribute('src','https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https://www.youtube.com/?1.1');
//             img_QR_code.setAttribute('class','QR_code');
//             div_tickets.insertBefore(img_QR_code, div_tickets.children[0]);

//             var div_ticket_info = document.createElement('div');
//             div_ticket_info.setAttribute('class','ticket_info');
//             div_tickets.insertBefore(div_ticket_info, div_tickets.children[1]);

//             var p_1 = document.createElement('p');
//             p_1.innerHTML = "設施名稱：";
//             div_ticket_info.insertBefore(p_1, div_ticket_info.children[0]);

//             var span_faci_name = document.createElement('span');
//             span_faci_name.innerHTML = "宇宙雲霄飛車";
//             p_1.insertBefore(span_faci_name, p_1.children[0]);

//             var p_2 = document.createElement('p');
//             p_2.innerHTML = "購買日期：";
//             div_ticket_info.insertBefore(p_2, div_ticket_info.children[1]);

//             var span_date = document.createElement('span');
//             span_date.innerHTML = "2017-1-17";
//             p_2.insertBefore(span_date, p_2.children[0]);

//             var p_3 = document.createElement('p');
//             p_3.innerHTML = "訂單編號：";
//             div_ticket_info.insertBefore(p_3, div_ticket_info.children[2]);

//             var span_order_num = document.createElement('span');
//             span_order_num.innerHTML = "1";
//             p_3.insertBefore(span_order_num, p_3.children[0]);

//             var p_4 = document.createElement('p');
//             p_4.innerHTML = "未使用：";
//             div_ticket_info.insertBefore(p_4, div_ticket_info.children[3]);

//             var span_unused = document.createElement('span');
//             span_unused.innerHTML = "1張";
//             p_4.insertBefore(span_unused, p_4.children[0]);

//             var textnode = document.createTextNode('　已使用：');
//             p_4.insertBefore(textnode, p_4.children[1]);

//             var span_used = document.createElement('span');
//             span_used.innerHTML = "1張";
//             p_4.insertBefore(span_used, p_4.children[2]);

//             var div_button_area = document.createElement('div');
//             div_button_area.setAttribute('class','button_area');
//             div_ticket_info.insertBefore(div_button_area, div_ticket_info.children[4]);

//             var a_more_info = document.createElement('a');
//             a_more_info.setAttribute('class','more_info');
//             a_more_info.setAttribute('href','vaild_facility_tickets.html');   
//             a_more_info.innerHTML = "詳細資訊";
//             div_button_area.insertBefore(a_more_info, div_button_area.children[0]);

//             var a_rate_faci = document.createElement('a');
//             a_rate_faci.setAttribute('class','rate_faci');
//             a_rate_faci.setAttribute('href','rate_facility.html');   
//             a_rate_faci.innerHTML = "評價設施";
//             div_button_area.insertBefore(a_rate_faci, div_button_area.children[1]);


//         };
//     };
     

//     //用mem_id去theater_order_list資料表抓theater_ticket_no 
//     getTheaterTicketNo();
//     function getTheaterTicketNo(){
//         var xhr = new XMLHttpRequest();

//         xhr.onload = function (){

//             if (xhr.status == 200){
//                 var theater_ticket_item = JSON.parse(xhr.responseText);
//                 var ticket_amount = theater_ticket_item.ticket_amount;
//                 localStorage.setItem('QR_amount_theater',ticket_amount);
//                 console.log("QR_amount_theater:"+ ticket_amount);
//                 // var ticket_amount  = theater_ticket_item.ticket_amount ;
//                 // localStorage.setItem('ticket_amount',ticket_amount);
//                 // console.log("ticket_amount:" + ticket_amount);
//                 console.log(theater_ticket_item);
//             }else{
//                 alert(xhr.status);
//             }

//         }
//         var determine = 'getTheaterTicketNo';
//         var mem_id = localStorage.getItem('mem_id');
//         var url = "fetch_from(theater_order_list).php?mem_id=" + mem_id + "&determine=" + determine;
//          xhr.open("Get", url, true);
//          xhr.send();
//     }











//     //Theater order List資料表中有幾筆就create幾個出來
//     createTheaterTickets();
//     function createTheaterTickets(){
//         var QR_amount_theater = localStorage.getItem('QR_amount_theater');
//         for (let a = 0; a < QR_amount_theater; a++) {
        
//             var div_tickets = document.createElement('div');
//             div_tickets.setAttribute('class', 'tickets');
//             tickets_area[1].insertBefore(div_tickets, tickets_area[1].children[1]);
    
//             var img_QR_code = document.createElement('img');
//             img_QR_code.setAttribute('src','https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https://www.youtube.com/?1.1');
//             img_QR_code.setAttribute('class','QR_code');
//             div_tickets.insertBefore(img_QR_code, div_tickets.children[0]);
            
//             var div_ticket_info = document.createElement('div');
//             div_ticket_info.setAttribute('class','ticket_info');
//             div_tickets.insertBefore(div_ticket_info, div_tickets.children[1]);
    
//             var p_1 = document.createElement('p');
//             p_1.innerHTML = "劇名：";
//             div_ticket_info.insertBefore(p_1, div_ticket_info.children[0]);
    
//             var span_program_name = document.createElement('span');
//             span_program_name.innerHTML = "尋找星生命";
//             p_1.insertBefore(span_program_name, p_1.children[0]);
    
//             var p_2 = document.createElement('p');
//             p_2.innerHTML = "購買日期：";
//             div_ticket_info.insertBefore(p_2, div_ticket_info.children[1]);
    
//             var span_perform_date = document.createElement('span');
//             span_perform_date.innerHTML = "2017-1-17";
//             p_2.insertBefore(span_perform_date, p_2.children[0]);
            
//             var textnode_space = document.createTextNode('　');
//             p_2.insertBefore(textnode_space, p_2.children[1]);
            
//             var span_perform_time = document.createElement('span');
//             span_perform_time.innerHTML = "15:00";
//             p_2.insertBefore(span_perform_time, p_2.children[2]);
    
//             var p_3 = document.createElement('p');
//             p_3.innerHTML = "訂單編號：";
//             div_ticket_info.insertBefore(p_3, div_ticket_info.children[2]);
    
//             var span_theaterticket_no = document.createElement('span');
//             span_theaterticket_no.innerHTML = "1";
//             p_3.insertBefore(span_theaterticket_no, p_3.children[0]);
    
//             var p_4 = document.createElement('p');
//             p_4.innerHTML = "未使用：";
//             div_ticket_info.insertBefore(p_4, div_ticket_info.children[3]);
    
//             var span_unused = document.createElement('span');
//             span_unused.innerHTML = "1張";
//             p_4.insertBefore(span_unused, p_4.children[0]);
    
//             var textnode = document.createTextNode('　已使用：');
//             p_4.insertBefore(textnode, p_4.children[1]);
    
//             var span_used = document.createElement('span');
//             span_used.innerHTML = "1張";
//             p_4.insertBefore(span_used, p_4.children[2]);
    
//             var a_more_info = document.createElement('a');
//             a_more_info.setAttribute('class','more_info_theater');
//             a_more_info.setAttribute('href','vaild_theater_tickets.html');   
//             a_more_info.innerHTML = "詳細資訊";
//             div_ticket_info.insertBefore(a_more_info, div_ticket_info.children[4]);
//         }  
//     }
     











   });
   
   
   
    


   