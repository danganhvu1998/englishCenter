var student = {};

function showWrite(){
    if( document.getElementById("hiddenWrite").style.display == "block"){
        document.getElementById("hiddenWrite").style.display = "none";
    } else {
        document.getElementById("hiddenWrite").style.display = "block";
    }
}

function showSpeak(){
    if( document.getElementById("hiddenSpeak").style.display == "block"){
        document.getElementById("hiddenSpeak").style.display = "none";
    } else {
        document.getElementById("hiddenSpeak").style.display = "block";
    }
}

function studentInfo(){
    if(document.getElementById("studentName").value.length==0){
        student.name = document.getElementById("studentName1").value;
    } else {
        student.name = document.getElementById("studentName").value;
    }
    if(document.getElementById("studentPhone").value.length==0){
        student.phone = document.getElementById("studentPhone1").value;
    } else {
        student.phone = document.getElementById("studentPhone").value;
    }
    if(student.name.length==0 || student.phone.length==0){
        alert("Please tell us your name and number! We only use it when you come to register a class");
        return 0;
    }
    return 1;
}

function submitWrite(){
    //writing1, writing2
    if(!studentInfo()) return 0;
    let writing1 = document.getElementById("writing1").value;
    let writing2 = document.getElementById("writing2").value;
    if(writing1.length+writing2.length<300) {
        alert("Write something more ... Too short!");
        return 0;
    } else if(writing1.length+writing2.length>7000){
        alert("Too long!");
        return 0;
    }
    student.subject="writing";
    student.submission="Writing 1: "+ writing1+ "                                           <br>\n-------\n<br>                                           Writing 2: "+writing2;
    submit(student);
}

function submitSpeak(){
    //speaking
    if(!studentInfo()) return 0;
    let speaking = document.getElementById("speaking").value;
    if(speaking.length<10) {
        alert("Please copy a right link!");
        return 0;
    }
    student.subject="speaking";
    student.submission=speaking;
    submit(student);
}

function submit(data){
    console.log(data);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log(this.readyState, this.status);
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    };
    xhttp.open("POST", "http://localhost:8000/api/freetest", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    let sendData = "name="+data.name
        +"&phone="+data.phone
        +"&subject="+data.subject
        +"&submission="+data.submission;
    console.log(sendData);
    xhttp.send(sendData);
}
