var student = {};

function showIelts(){
    hideAllAll();
    document.getElementById("hiddenIelts").style.display = "block";
}

function showToeic(){
    hideAllAll();
    document.getElementById("hiddenToeic").style.display = "block";
}

function showWrite(){
    hideAll();
    document.getElementById("hiddenWrite").style.display = "block";
}

function showSpeak(){
    hideAll();
    document.getElementById("hiddenSpeak").style.display = "block";
}

function showRead(){
    hideAll();
    document.getElementById("hiddenRead").style.display = "block";
}

function showListen(){
    hideAll();
    document.getElementById("hiddenListen").style.display = "block";
}

function showListenToeic(){
    hideAll();
    document.getElementById("hiddenListenToeic").style.display = "block";
}

function showReadingToeic(){
    hideAll();
    document.getElementById("hiddenReadingToeic").style.display = "block";
}

function hideAll(){
    document.getElementById("hiddenSpeak").style.display = "none";
    document.getElementById("hiddenWrite").style.display = "none";
    document.getElementById("hiddenRead").style.display = "none";
    document.getElementById("hiddenListen").style.display = "none";
    document.getElementById("hiddenReadingToeic").style.display = "none";
    document.getElementById("hiddenListenToeic").style.display = "none";
}

function hideAllAll(){
    document.getElementById("hiddenToeic").style.display = "none";
    document.getElementById("hiddenIelts").style.display = "none";
    document.getElementById("hiddenSpeak").style.display = "none";
    document.getElementById("hiddenWrite").style.display = "none";
    document.getElementById("hiddenRead").style.display = "none";
    document.getElementById("hiddenListen").style.display = "none";
    document.getElementById("hiddenReadingToeic").style.display = "none";
    document.getElementById("hiddenListenToeic").style.display = "none";
}

function studentInfo(){
    student.name = document.getElementById("studentName").value;
    student.phone = document.getElementById("studentPhone").value+"-"+document.getElementById("studentEmail").value;

    if(student.name.length==0 || student.phone.length==0){
        alert("Please tell us your name, email and number! We will use it to inform you your test result!");
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
    //student.submission = student.submission.replace("\n", "<br>");
    while(student.submission.includes("\n") )
        student.submission = student.submission.replace("\n", "<br>");
    submit(student);
    showWrite();
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
    showSpeak();
}

function judgeAnswer(ans, rightAns){
    ans = ans.toLowerCase().replace(/\s/g, '');
    rightAns = rightAns.toLowerCase().replace(/\s/g, '');
    if(ans == rightAns) return 1;
    return 0;
}

function submitRead(){
    if(!studentInfo()) return 0;
    var result = 0;
    var rightAns = ["1","FALSE   ","TRUE   ","NOT GIVEN","FALSE","TRUE   ","FALSE ","TRUE ","C   ","C  ","B ","A ","D ","C ","C ","A ","B ","B ","C ","A ","C ","B ","A ","brain dead ","sociopathic behaviour ","neocortex ","animal propensities ","C ","D ","B ","E ","A ","Yes  ","Not given ","Not given ","No ","prudent practice ","privatisation policy  ","incentives ","permit" ,"regulatory agency"];
    for(var i = 1; i<=40; i++){
        ansID = "r"+i;
        let ans = document.getElementById(ansID).value;
        result += judgeAnswer(ans, rightAns[i]);
    }
    alert("Your score is "+ result+". Have a good day with Go Languages!")
    student.subject="reading";
    student.submission= "Score is "+ result +"/40";
    submit(student);
}

function submitListen(){
    if(!studentInfo()) return 0;
    var result = 0;
    var rightAns = ["1","mountains", "horse", "gardens", "lunch", "map", "experience", "Ratchesons", "helmet", "shop", "267", "A", "A", "C", "C", "A", "E", "F", "C", "D", "B", "B", "C", "C", "budget", "employment", "safety", "insurance", "dairy", "database", "museum", "damage", "side effects", "bridge", "confusion", "smartphone", "resources", "unnecessary", "chocolate bar", "problem", "market share"];
    for(var i = 1; i<=40; i++){
        ansID = "l"+i;
        let ans = document.getElementById(ansID).value;
        result += judgeAnswer(ans, rightAns[i]);
    }
    alert("Your score is "+ result+". Have a good day with Go Languages!")
    student.subject="listening";
    student.submission= "Score is "+ result +"/40";
    submit(student);
}

function submitListenToeic(){
    if(!studentInfo()) return 0;
    var result = 0;
    var rightAns = "1BCAADCDBCCACDCCDDCBCDBAAACDBACDBBACDDBDBDDCAACCDDCCCCBCBADBCACBABCACCACDDABADBCCCBDCBADBDAABDCCDCBAC";
    for(var i = 1; i<=100; i++){
        ansID = "lt"+i;
        let ans = document.getElementById(ansID).value;
        result += judgeAnswer(ans, rightAns[i]);
    }
    alert("Your score is "+ result+". Have a good day with Go Languages!")
    student.subject="listeningToeic";
    student.submission= "Score is "+ result +"/100";
    submit(student);
}

function submitReadToeic(){
    if(!studentInfo()) return 0;
    var result = 0;
    var rightAns = "1ABACCBCDADCCABCABBABACCBBBABABBCCABCCCAABADCABDCCBBABCBACCACBCDDBDDCBDDBBDCACBCDCCBCCBADAACDACBBBBDA";
    for(var i = 1; i<=100; i++){
        ansID = "rt"+i;
        let ans = document.getElementById(ansID).value;
        result += judgeAnswer(ans, rightAns[i]);
    }
    alert("Your score is "+ result+". Have a good day with Go Languages!")
    student.subject="ReadingToeic";
    student.submission= "Score is "+ result +"/100";
    submit(student);
}

function submit(data){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    };
    xhttp.open("POST", "http://golanguages.edu.vn:8000/api/freetest", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    let sendData = "name="+data.name
        +"&phone="+data.phone
        +"&subject="+data.subject
        +"&submission="+data.submission;
    xhttp.send(sendData);
}
