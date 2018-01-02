//儲存到sessionStorage
var storage = sessionStorage;

// document.getElementById("quantity").onchange = function() {myFunction()};

//改變節目名稱之後，直接存到sessionStorage 
function changeTheaterName() {
    // document.querySelector('input[name="programName"]:checked').value;

    //儲存到sessionStorage
    var programName = document.querySelector('input[name="programName"]:checked').value;
    storage.setItem("programName", programName);
}

//改變日期之後，直接存到sessionStorage
function changeDate() {
    // document.getElementById("programdate").value;

    //儲存到sessionStorage
    var programDate = document.getElementById("programDate").value;
    storage.setItem("programDate", programDate);

}

//改變場次之後，直接存到sessionStorage
function changeEvent(e) {
    //抓取使用者選的值
    var e = document.getElementById("programTime");
    var programTime = e.options[e.selectedIndex].value;
    //儲存到sessionStorage
    // var storage = sessionStorage;
    storage.setItem("programTime", programTime);

}

//改變數量之後，直接存到sessionStorage 
function changeQuantity() {
    //數量改變，改變總額
    quantity_value = Number(document.getElementById('quantity').value);
    total = quantity_value * 500;
    document.getElementById('total').innerHTML = total;

    //改變數量之後，直接存到sessionStorage 
    storage.setItem("theater_quantity", quantity_value);

    storage.setItem("theater_total", total);

    // var theater_quantity =document.getElementById("quantity").value;
    // storage.setItem("theater_quantity",theater_quantity);
}