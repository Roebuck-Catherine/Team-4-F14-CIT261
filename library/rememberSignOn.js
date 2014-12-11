function signOn() {
    if(document.getElementById('rememberSignOn').value === 'check'){
        localStorage.setItem('signOnName', document.getElementById('orgName').value);
        localStorage.setItem('signOnPswd', document.getElementById('orgPswd').value);
    }
    else {
        localStorage.removeItem('signOnName');
        localStorage.removeItem('signOnPswd');
    }
}

function getSignOnInfo(){
    if(localStorage.getItem('signOnName') !== null){
        document.getElementById('orgName').value = localStorage.getItem('signOnName');
        document.getElementById('orgPswd').value = localStorage.getItem('signOnPswd');
        document.getElementById('rememberSignOn').value = "un-check";
        document.getElementById("rememberSignOn").checked=true;
    }
}