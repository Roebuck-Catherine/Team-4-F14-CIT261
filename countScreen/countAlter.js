localStorage.setItem("countInterval");
localStorage.countInterval = 1;
localStorage.setItem("personalCount", 0);
localStorage.personalCount = 0;


function updateLiveTotal(){
    var success ="font-size: 45px;\n\
                text-align: right;\n\
                background: -webkit-linear-gradient(#BFBFBF, #798075); /* For Safari 5.1 to 6.0 */\n\
                background: -o-linear-gradient(#BFBFBF, #798075); /* For Opera 11.1 to 12.0 */\n\
                background: -moz-linear-gradient(#BFBFBF, #798075); /* For Firefox 3.6 to 15 */\n\
                background: linear-gradient(#BFBFBF, #798075); /* Standard syntax */;";
    var error = "background: linear-gradient(to bottom, #be1d2d 0%,#5e0f15 77%,#5b0e13 100%);\n\
                text-align: right;\n\
                font-size: 40px;";
        $.ajax({
            method: "POST",
            url: "/countScreen/updateLiveTotal.php",
            dataType: "json",
            cache: false,
            success: function(html){
                document.getElementById('totalCount').setAttribute("style",success);
                var total = html.totalCount;
                document.getElementById('totalCount').innerHTML = total;
            },
            error: function(){
            document.getElementById('totalCount').setAttribute("style",error);
            document.getElementById('totalCount').innerHTML = 'Trying Again...';
            
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
        updateDatabase (currentCount);
}

function updateDatabase (count) {
    var myAjax=new XMLHttpRequest(); //setup AJAX object
    //set current user, count as an object, convert to JSON

//var jsonSend = JSON.stringify({name: username, count: currentCount})


myAjax.onreadystatechange = function() {
    if (myAjax.readyState==4 && myAjax.status==200) {
        document.getElementById("personalCount").innerHTML=myAjax.responseText;
    }

    }


myAjax.open(“GET”,"updatePersonalCount.php", true);
myAjax.send();

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