        var submit = document.getElementById('submit');
        var light_box = document.getElementById('light_box');
        var light_box_back = document.getElementById('light_box_back');
        var cancel = document.getElementById('cancel');
        var forsure = document.getElementById('forsure');
        var facility_icon = document.getElementsByClassName('facility_icon');
        var btn_check_tickets = document.querySelector('.btn_check_tickets')
        var now_facility_chinese = null;
        var now_facility_english = null;
        var title = document.querySelector('#choose_facility h1');
        var icon_wrapper = document.querySelectorAll('.icon_wrapper');
        var show_where_now = document.querySelector('.show_where_now');
        var show_where_photo = document.getElementById('show_where_photo');
        var rechoose = document.getElementById('rechoose');
        var b_sn_btn = document.getElementsByClassName('b_sn_btn');


        //設施驗票按鈕一開始先關閉
        b_sn_btn[1].style.display = 'none';


        for (var i = 0; i < facility_icon.length; i++) {

            facility_icon[i].addEventListener('click', function () {

                b_sn_btn[1].style.display = 'block'; //設施驗票按鈕開啟

                // 顯示所在設施 
                now_facility_chinese = this.getAttribute('data-title');
                now_facility_english = this.getAttribute('data-facility');

                title.innerHTML = '目前所在設施為：' + now_facility_chinese;
                icon_wrapper[0].style.display = 'none';
                icon_wrapper[1].style.display = 'none';
                show_where_now.style.display = 'block';
                show_where_photo.setAttribute('src', '/img/secondSection/' + now_facility_english + '_img.jpg');

                // 上方標籤註冊click事件 
                b_sn_btn[0].addEventListener('click', function () {
                    openCity(event, 'choose_facility');
                });
                b_sn_btn[1].addEventListener('click', function () {
                    openCity(event, 'check_tickets');
                });



                function openCity(evt, list) {

                    var i, tabcontent;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }

                    //再抓一次
                    b_sn_btn = document.getElementsByClassName("b_sn_btn");
                    for (i = 0; i < b_sn_btn.length; i++) {
                        b_sn_btn[i].className = b_sn_btn[i].className.replace(" active", "");
                        b_sn_btn[i].setAttribute("id", "");
                    }
                    document.getElementById(list).style.display = "block";
                    evt.currentTarget.className += " active";

                    evt.currentTarget.setAttribute("id", "active");



                };

                // Get the element with id="defaultOpen" and click on it
                // document.getElementById("active").click();


                //重新選擇設施
                rechoose.addEventListener('click', function () {

                    icon_wrapper[0].style.display = 'flex';
                    icon_wrapper[1].style.display = 'flex';
                    show_where_now.style.display = 'none';
                    title.innerHTML = '選擇所在設施';
                    now_facility_english = null;
                    b_sn_btn[1].style.display = 'none'; //設施驗票按鈕關閉
                });
            });

        }




        // for (var i = 0; i < b_sn_btn.length; i++) {
        //      b_sn_btn[i].addEventListener('click',isChoose);

        // };





        /* ============== 驗票數量確認燈箱 ============== */

        // submit.onclick = function () {
        //     light_box.style.display = "block";
        //     light_box_back.style.display = "block";
        //     window.onwheel = preventDefault;
        // };
        // cancel.onclick = function () {
        //     light_box.style.display = "none";
        //     light_box_back.style.display = "none";
        //     window.onwheel = preventDefault;

        // };
        // forsure.onclick = function () {
        //     light_box.style.display = "none";
        //     light_box_back.style.display = "none";
        //     window.onwheel = allowDefault;
        // };

        function preventDefault(e) {
            e = e || window.event;
            if (e.preventDefault) {
                e.preventDefault();
                e.returnValue = false;
            }

        }

        function allowDefault(e) {
            e = e || window.event;
            if (e.allowDefault) {
                e.allowDefault();
                e.returnValue = false;
            }

        }