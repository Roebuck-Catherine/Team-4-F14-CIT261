localStorage.setItem("countInterval");
localStorage.setItem("personalCount", 0);

function countAlter(value){
            var currentCount = localStorage.getItem("personalCount");
            if (value === 'subtract'){
                currentCount -= 1;
            }
            if (value === 'add'){
<<<<<<< HEAD
                currentCount = +currentCount + +localStorage.countInterval;
            }

        //Update Local Storage Count
        localStorage.personalCount = currentCount;
=======
                currentCount = +currentCount + +countInterval;
            }

// MOVED THIS CODE TO DIFFERENT FUNCTION BELOW TO REDUCE REDUNDANT CODE EXECUTION FOR AJAX CALL
//            if (value === 'resetToZero'){
//                currentCount = 0;
//            }
//            if (value === '1Xint'){
//                countInterval = 1;
//            }
//            if (value === '2Xint'){
//                countInterval = 2;
//            }
//            if (value === '3Xint'){
//                countInterval = 3;
//            }
//            if (value === '5Xint'){
//                countInterval = 5;
//            }
>>>>>>> parent of 45b95a6... Attempting AJAX
        
        //Get Local Storage Value to update count on screen
        document.getElementById('personalCount').innerHTML = localStorage.getItem("personalCount");
        
//THIS IS WHERE CODE WILL BE TO UPDATE THE DATABASE WHEN BUTTONS ARE PRESSED
//    $.ajax({
//        type: "POST",
//        url: "/updatePersonalCount.php",
//        data: id,
//        success: function(){
//            
//        },
//        error: function(){
//            var el = document.createElement("div");
//            el.setAttribute("style",style);
//            el.innerHTML = 'ERROR UPDATING! TRY AGAIN...';
//            setTimeout(function(){
//             el.parentNode.removeChild(el);
//            },4000);
//            document.body.appendChild(el);
//        }
//    }); 
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