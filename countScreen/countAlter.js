localStorage.setItem("countInterval");
localStorage.setItem("personalCount", 0);

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
}

xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("personalCount").innerHTML=xmlhttp.responseText;

    }


//xmlhttp.open(“GET”,”updatePersonalCount.php?send=”+jsonSend, true);
xmlhttp.send();

}


function changeInterval(value){
    localStorage.countInterval = value;
    
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