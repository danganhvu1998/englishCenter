var student = {};

function checkReading(){
    studentInfo();
    if(student.name.length==0 || student.phone.length==0){
        alert("Please tell us your name and number! We only use it when you come to register a class\nIf you cannot find where to write, click menu on top right");
    } else {
        let score = scoreReading();
        alert("Your score is "+ score+"/40\nThis score is base on our answer. Since it is impossible to cover all correct answers so your true score may be a bit higher");
        student.subject="reading";
        student.submission=score;
        submit(student);
        
    }
    
}

function checkListening(){
    studentInfo();
    if(student.name.length==0 || student.phone.length==0){
        alert("Please tell us your name and number! We only use it when you come to register a class\nIf you cannot find where to write, click menu on top right");
    } else {
        let score = scoreListening();
        alert("Your score is "+ scoreListening()+"/40\nThis score is base on our answer. Since it is impossible to cover all correct answers so your true score may be a bit higher");
        student.subject="listening";
        student.submission=score;
        submit(student);
    }
}

function scoreListening(){
    let clientAnswer = [];
    let answer=["1", "94635550","Clark House","University Drive","Monday","Thursday","a/one/1 month","A","C","B","C","Computer as Teacher","University of Melbourne","top floor","ground floor","3:10","Palm Lounge","C","B","B","A","C","A","B","B","A","C","C,E,F","C,E,F","C,E,F","textbook allowance","plastic","processing","seasoned","polished","cost","grain pattern","words","0.8","0.1","black velvet",""]
    
    for(let i=1;i<=26;i++){
        let id = "txtq"+i;
        clientAnswer[i] = document.getElementById(id).innerText.toLowerCase();
    }

    clientAnswer[27]= document.getElementById("txtq27-29").innerText.toLowerCase();
    clientAnswer[28]= document.getElementById("txtq27-29").innerText.toLowerCase();
    clientAnswer[29]= document.getElementById("txtq27-29").innerText.toLowerCase();

    for(let i=30;i<=40;i++){
        let id = "txtq"+i;
        clientAnswer[i] = document.getElementById(id).innerText.toLowerCase();
    }

    let result = 0;
    for(let i=1;i<=40;i++){
        if(i==2 || i==3 || i==6 || i==30 || i==36 || i==40 || (i>10&&i<17)) continue;
        if(clientAnswer[i].includes(answer[i].toLowerCase())) ++result;
    }

    if(clientAnswer[2].includes("clark") && clientAnswer[2].includes("house")) ++result;
    if(clientAnswer[3].includes("university") && clientAnswer[3].includes("drive")) ++result;
    if((clientAnswer[6].includes("a")||clientAnswer[6].includes("1")||clientAnswer[6].includes("one")) && clientAnswer[6].includes("month")) ++result;
    if(clientAnswer[30].includes("textbook") && clientAnswer[30].includes("allowance")) ++result;
    if(clientAnswer[36].includes("grain") && clientAnswer[36].includes("pattern")) ++result;
    if(clientAnswer[40].includes("black") && clientAnswer[40].includes("velvet")) ++result;
    if(clientAnswer[11].includes("computer") && clientAnswer[11].includes("teacher")) ++result;
    if(clientAnswer[12].includes("university") && clientAnswer[12].includes("melbourne")) ++result;
    if(clientAnswer[13].includes("top") && clientAnswer[13].includes("floor")) ++result;
    if(clientAnswer[14].includes("ground") && clientAnswer[14].includes("floor")) ++result;
    if(clientAnswer[15].includes("3") && clientAnswer[15].includes("10")) ++result;
    if(clientAnswer[16].includes("palm") && clientAnswer[16].includes("lounge")) ++result;


    return result;
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
}

function scoreReading(){
    let clientAnswer = [];
    let answer=["1","v","i","vi","x","ix","iv","ii","TRUE","TRUE","NOT GIVEN","C,D,E","C,D,E","C,D,E","YES","YES","NO","NOT GIVEN","YES","NOT GIVEN","1976, 1995","2000 floods/flooding","1998 and 2002/1998, 2002","1990","1781","France","D","B","C","H","G","E","D","A","bee-keeping","life cycles","drought","C","A","D","D"]
    
    for(let i=1;i<=10;i++){
        let id = "txtq"+i;
        clientAnswer[i] = document.getElementById(id).innerText.toLowerCase();
    }

    clientAnswer[11]= document.getElementById("txtq11-13").innerText.toLowerCase();
    clientAnswer[12]= document.getElementById("txtq11-13").innerText.toLowerCase();
    clientAnswer[13]= document.getElementById("txtq11-13").innerText.toLowerCase();

    for(let i=14;i<=40;i++){
        let id = "txtq"+i;
        clientAnswer[i] = document.getElementById(id).innerText.toLowerCase();
    }

    let result = 0;
    for(let i=1;i<=40;i++){
        if(i>19 && i<23) continue;
        if(clientAnswer[i].includes(answer[i].toLowerCase())) ++result;
    }

    if(clientAnswer[21].includes("2000") && clientAnswer[21].includes("flood")) ++result;
    if(clientAnswer[22].includes("1998") && clientAnswer[22 ].includes("2002")) ++result;
    if(clientAnswer[20].includes("1976") && clientAnswer[20].includes("1995")) ++result;

    return result;
}

function submit(data){
    console.log(data);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log(this.readyState, this.status);
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
            window.location.assign("file:///home/kyatod/githubResource/englishCenter/goenglish/test.html");
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