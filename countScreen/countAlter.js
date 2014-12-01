localStorage.setItem("countInterval");
localStorage.countInterval = 1;
localStorage.setItem("personalCount", 0);
localStorage.personalCount = 0;


function updateLiveTotal(){
    var style = "position:fixed; \n\
                top:0px; \n\
                left: 50%; \n\
                width: 300px; \n\
                margin-left: -150px; \n\
                background: linear-gradient(to bottom, #be1d2d 0%,#5e0f15 77%,#5b0e13 100%); \n\
                color: #ffffff; \n\
                font-family: sans-serif; \n\
                text-align: center; \n\
                padding: 5px 10px 5px 10px;\n\
                -moz-border-radius: 0px 0px 10px 10px;\n\
                border-radius: 0px 0px 10px 10px;\n\
                z-index: 15;";
        $.ajax({
            method: "POST",
            url: "/countScreen/updateLiveTotal.php",
            dataType: "json",
            cache: false,
            success: function(html){
                var total = html.totalCount;
                document.getElementById('totalCount').innerHTML = total;
                
                var el = document.createElement("div");
                el.setAttribute("style",style);
                el.innerHTML = 'Its Working...';
                setTimeout(function(){
                 el.parentNode.removeChild(el);
                },1000);
                document.body.appendChild(el);
            },
            error: function(){
            var el = document.createElement("div");
            el.setAttribute("style",style);
            el.innerHTML = 'ERROR UPDATING, AJAX FAILED';
            setTimeout(function(){
             el.parentNode.removeChild(el);
            },1000);
            document.body.appendChild(el);
            }
        });
    self.setInterval(updateLiveTotal,5000);
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
