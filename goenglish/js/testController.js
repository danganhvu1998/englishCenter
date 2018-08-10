function checkReading(){
    for(let i=1;i<=10;i++){
        let id = "q-"+i;
        console.log(id, document.getElementById(id).value);
    }
    for(let i=14;i<=40;i++){
        let id = "q-"+i;
        console.log(id, document.getElementById(id).value);
    }
}