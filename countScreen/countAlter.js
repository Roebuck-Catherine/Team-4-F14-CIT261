
function countAlter(value){
    var type = value;
    var currentCount = document.getElementById('odometer').innerHTML;
    var countInterval = 1;
    
    if (type === 'subtract'){
        currentCount -= 1;
    }
    if (type === 'add'){
        currentCount ++;
    }
    
    //ajax call will go here...
    
    document.getElementById('odometer').innerHTML = 1;
}