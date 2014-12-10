$(document).ready(function(){
    if (localStorage.getItem("countInterval") === null) {
        localStorage.setItem("countInterval", 1);
    }
    if (localStorage.getItem("personalCount") === null) {
        localStorage.setItem("personalCount", 0);
    }
    window.setInterval(function(){
       updateLiveTotal();
    }, 5000);
 });

function updateLiveTotal(){
    var success ="font-size: 45px;\n\
                background: -webkit-linear-gradient(#BFBFBF, #798075); /* For Safari 5.1 to 6.0 */\n\
                background: -o-linear-gradient(#BFBFBF, #798075); /* For Opera 11.1 to 12.0 */\n\
                background: -moz-linear-gradient(#BFBFBF, #798075); /* For Firefox 3.6 to 15 */\n\
                background: linear-gradient(#BFBFBF, #798075); /* Standard syntax */;";
    var error = "background: linear-gradient(to bottom, #be1d2d 0%,#5e0f15 77%,#5b0e13 100%);\n\
                font-size: 40px;";
        $.ajax({
            method: "POST",
            url: "/countScreen/updateLiveTotal.php",
            dataType: "json",
            cache: false,
            success: function(html){
                document.getElementById('totalCount').setAttribute("style",success);
                var total = html.totalCount;
                if (total <= 0){
                    var total = 0;
                }
                document.getElementById('totalCount').innerHTML = total;
            },
            error: function(){
                document.getElementById('totalCount').setAttribute("style",error);
                document.getElementById('totalCount').innerHTML = 'Trying Again...';
            }
        });
}


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
        
        try {
            updateDatabase(currentCount);
        }
        catch ($error){
            alert("Error Updating Database");
        } 
}

//Help From Bryce
function updateDatabase(count) {
    var success ="font-size: 62px;\n\
                background: -webkit-linear-gradient(#BFBFBF, #58A831); /* For Safari 5.1 to 6.0 */\n\
                background: -o-linear-gradient(#BFBFBF, #58A831); /* For Opera 11.1 to 12.0 */\n\
                background: -moz-linear-gradient(#BFBFBF, #58A831); /* For Firefox 3.6 to 15 */\n\
                background: linear-gradient(#BFBFBF, #58A831); /* Standard syntax */";
    var error = "background: linear-gradient(to bottom, #be1d2d 0%,#5e0f15 77%,#5b0e13 100%);\n\
                font-size: 40px;";
    $.ajax({
            method: "POST",
            url: "/countScreen/updatePersonalCount.php",
            data: "personalCount=" + count,
            cache: false,
            success: function(){
                document.getElementById('personalCount').setAttribute("style",success);
            },
            error: function(){
                document.getElementById('personalCount').setAttribute("style",error);
            }
        });
}

function updateButtonOnLoad(){
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
    try {
        updateDatabase(0);
    }
    catch ($error){
        $error = "Error Updating Database";
    } 
    
    var page = window.location.href;
    page = page + '/#close';
    window.location.assign(page);
}

function submitFinalCount() {
    try {
        updateDatabase(localStorage.getItem("personalCount"));
        
        localStorage.removeItem("personalCount");
        localStorage.removeItem("countInterval");
        
        var page = '/countScreen/?action=finalSubmit';
        window.location.assign(page); 
    }
    catch ($error){
        alert("Error Submiting Final Count");
        
        var page = window.location.href;
        page = page + '/#close';
        window.location.assign(page);
    } 
}