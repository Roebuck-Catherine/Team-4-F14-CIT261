
function countAlter(value){
    var type = value;
            var currentCount = document.getElementById('personalCount').innerHTML;
            var countInterval = 1;

            if (type === 'subtract'){
                currentCount -= 1;
            }
            if (type === 'add'){
                currentCount++;
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