function dbView(str){
    if (str == "") {
        document.getElementById("show-table").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            document.getElementById("show-table").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET","sql/dbGetTable.php?q="+str,true);
        xmlhttp.send();
    }
}

function dbMode(str){
    if (str == "") {
        document.getElementById("operation-status").innerHTML = "";
        return;
    }
    else if (str == "delete"){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            document.getElementById("operation-status").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET","sql/deleteRecord.php?q="+str,true);
        xmlhttp.send();
    }
}


