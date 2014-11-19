var countInterval = 1;

function countAlter(value){
            var currentCount = document.getElementById('personalCount').innerHTML;
            if (value === 'subtract'){
                currentCount -= 1;
            }
            if (value === 'add'){
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
        
        document.getElementById('personalCount').innerHTML = currentCount;
        
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
    countInterval = value;
    
    var page = window.location.href;
    page = page + '/#close';
    window.location.assign(page);
}

function resetCount(){
    document.getElementById('personalCount').innerHTML = 0;
    
    var page = window.location.href;
    page = page + '/#close';
    window.location.assign(page);
}