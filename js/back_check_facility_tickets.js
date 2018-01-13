var submit = document.getElementById('submit');
        var light_box = document.getElementById('light_box');
        var light_box_back = document.getElementById('light_box_back');
        var cancel = document.getElementById('cancel');
        var forsure = document.getElementById('forsure');
        

        submit.onclick = function () {
            light_box.style.display = "block";
            light_box_back.style.display = "block";
            window.onwheel = preventDefault;
        };
        cancel.onclick = function () {
            light_box.style.display = "none";
            light_box_back.style.display = "none";
            window.onwheel = preventDefault;

        };
        forsure.onclick = function () {
            light_box.style.display = "none";
            light_box_back.style.display = "none";
            window.onwheel = allowDefault;
        };

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