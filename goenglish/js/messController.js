function sendMessage(){
    let client = {}; 
    client.name = document.getElementById("name").value;
    client.email = document.getElementById("email").value;
    client.phone = document.getElementById("phone").value;
    client.message = document.getElementById("message").value;
    //client.name = "conmaxau";
    //client.phone = "123"
    if(client.name.length == 0){
        alert("Don't forget to tell us who you are ...");
        return 0;
    } else if (client.email.length==0 && client.phone.length==0){
        alert("Don't be shy. Please tell us how to contact you.");
        return 0;
    } else {
        if(client.email.length==0) client.email = "No information";
        if(client.phone.length==0) client.phone = "No information";
        postServer(client);
    }
}

function takeMaterial(){
    let client = {}; 
    client.name = document.getElementById("studentName").value;
    client.phone = document.getElementById("studentPhone").value
    client.email = document.getElementById("studentEmail").value;

    if(client.name.length==0 || client.phone.length==0){
        alert("Please tell us your name, email and number! We will use it to send you your free textbook!");
        return 0;
    }
    client.message = "Auto Message: Send me textbook via that gmail and phone number!";
    console.log(client);
    postServer(client);
}

function postServer(client) {
    //console.log("postServer", client);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log(this.readyState, this.status);
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    };
    xhttp.open("POST", "http://golanguages.edu.vn:8000/api/clients", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    let data = "name="+client.name
        +"&phone="+client.phone
        +"&email="+client.email
        +"&mess="+client.message;
    console.log(data);
    xhttp.send(data);
}

/*
var data = "username="+this.username.value
+"&password="+this.password.value
+"&rememberMe="+this.rememberMe.value*/