localStorage.setItem("countInterval");
localStorage.countInterval = 1;
localStorage.setItem("personalCount", 0);
localStorage.personalCount = 0;

function countAlter(value){
            var currentCount = localStorage.getItem("personalCount");
            if (value === 'subtract'){
                currentCount -= 1;
            }
            if (value === 'add'){
                currentCount = +currentCount + +localStorage.countInterval;
            }

        //Update Local Storage Count
        localStorage.personalCount = currentCount;

        //Get Local Storage Value to update count on screen
        document.getElementById('personalCount').innerHTML = localStorage.getItem("personalCount");
        
}

function updateDatabase () {
    var xmlhttp=new XMLHttpRequest(); //setup AJAX object
    //set current user, count as an object, convert to JSON

var jsonSend = JSON.stringify({name: username, count: currentCount})


xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("personalCount").innerHTML=xmlhttp.responseText;
    }

    }


//xmlhttp.open(“GET”,”updatePersonalCount.php?send=”+jsonSend, true);
xmlhttp.send();

}

function updateOnLoad(){
    document.getElementById('plus').innerHTML = "+" + localStorage.countInterval;
}

function changeInterval(value){
    localStorage.countInterval = value;
    document.getElementById('plus').innerHTML = "+" + value;
    
    var page = window.location.href;
    page = page + '/#close';
    window.location.assign(page);
}

function resetCount(){
    localStorage.personalCount = 0;
    document.getElementById('personalCount').innerHTML = 0;
    
    var page = window.location.href;
    page = page + '/#close';
    window.location.assign(page);
}

//function SubmitCount(){
//    var totalcount = currentCount;
//    
//    localStorage.personalCount = 0;
//    document.getElementById('personalCount').innerHTML = 0;
//}
