var storage = sessionStorage;

//從sessionStorage，取出節目名稱
var programName = storage.getItem('programName');
document.getElementById('program_name').innerText = programName;

//從sessionStorage，取出節目日期
var programDate = storage.getItem('programDate');
document.getElementById('Time_date').innerText = programDate;

//從sessionStorage，取出節目場次
var programTime = storage.getItem('programTime');
document.getElementById('Time_Event').innerText = programTime;

//從sessionStorage，取出數量
var theater_quantity = storage.getItem('theater_quantity');
document.getElementById('unused_ ticket').innerText = theater_quantity;

//從sessionStorage，取出小計
var theater_total = storage.getItem('theater_total');
document.getElementById('unpoints_total').innerText = theater_total + "元";

//取出使用者輸入的積分
var Scorenumber = Number(document.getElementById('Scorenumber').value);

//id是integral的欄位之預設值
document.getElementById('integral').innerHTML = "-" + Scorenumber + "元";

//小計減掉積分,應付金額
total = theater_total - Scorenumber;
document.getElementById('total').innerHTML = total + "元";

//判斷是否使用積分
function Userpoints() {
    var Scorepoints = document.querySelector('input[name="Scorepoints"]:checked').value;
    if (Scorepoints == 1) {
        //關閉使用者可以輸入的欄位(id是userpoints)
        document.getElementById('Scorenumber').disabled = false;
        var Scorenumber = Number(document.getElementById('Scorenumber').value);
        //id是integral的欄位之預設值
        document.getElementById('integral').innerHTML = "-" + Scorenumber + "元";
    } else {
        //讓使用者不能輸入
        document.getElementById('Scorenumber').value = 0;
        //直接改成0元
        document.getElementById('integral').innerHTML = 0 + "元";
        //關閉使用者可以輸入的欄位(id是userpoints)
        document.getElementById('Scorenumber').disabled = true;
    }
}

//扣掉積分
function changeScoreNumber() {
    var theater_total = storage.getItem('theater_total');

    var Scorenumber = Number(document.getElementById('Scorenumber').value);

    //值要連動到id是integral的欄位
    document.getElementById('integral').innerHTML = "-" + Scorenumber + "元";

    //小計減掉積分,應付金額
    total = theater_total - Scorenumber;
    document.getElementById('total').innerHTML = total + "元";
}