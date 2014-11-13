var countInterval = 1;

function countAlter(value){
            var currentCount = document.getElementById('personalCount').innerHTML;
            if (value === 'subtract'){
                currentCount -= 1;
            }
            if (value === 'add'){
                currentCount = +currentCount + +countInterval;
            }
            document.getElementById('personalCount').innerHTML = currentCount;
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
