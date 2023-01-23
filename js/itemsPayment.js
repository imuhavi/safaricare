
var myJSON;
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
    })

function setSummaryData(obj){
    //var userID = obj.userId;
    var pickup = obj.itemInfo.pickup;
    var destination = obj.destination;
    var itemId = obj.itemInfo.itemId;
    var item = obj.itemInfo.item;
    var storename = obj.storename;
    var price = obj.itemInfo.price;

    //document.getElementById("userId").innerHTML = userID;
    document.getElementById("pickup").textContent = pickup;
    document.getElementById("destination").innerHTML = destination;
    document.getElementById("itemId").textContent = itemId;
    document.getElementById("item").textContent = item;
    document.getElementById("address").textContent = storename;
    document.getElementById("price").innerHTML = price;
    var username = document.getElementById("userId").innerText;
    console.log("BITCH");
    console.log(username);
    console.log(pickup);
    console.log(item);
    console.log(storename);
    console.log(price);
}

function storeRecord(){
    $.post("sql/orderRecord.php",
    {
      json: myJSON,
    },
    function(data, status){
        document.getElementById("payment-status").innerHTML = data;
        console.log("Data: " + data + "\nStatus: " + status);
    });
}

$(document).ready(function (){
    // document.getElementById("payment-status").innerHTML = '';
    myJSON = localStorage.getItem("jsonItems");
    // console.log(myJSON);

    var obj = JSON.parse(myJSON);
    // console.log(obj);
    setSummaryData(obj);

    document.getElementById("confirm-pay").addEventListener('click', storeRecord);
    document.getElementById("confirm-pay").onclick = function (){
        alert("Success! Order added to DB");
        $("#payment").css("display","none");
        $("#payment-header").text("Your item will be delivered shortly.");
        $("#summary").css("margin-right","auto");
        $("#summary").css("margin-left","auto");
    }
});