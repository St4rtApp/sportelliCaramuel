Date.prototype.allMonthDays = function(){
    if (this.getMonth()==0) {return 31}

    if (this.getMonth()==1 && this.getFullYear()%4!=0) {return 28} 
    else if(this.getMonth()==1 && this.getFullYear()%4==0){return 29}

    if (this.getMonth()==2) {return 31}
    if (this.getMonth()==3) {return 30}
    if (this.getMonth()==4) {return 31}
    if (this.getMonth()==5) {return 30}
    if (this.getMonth()==6) {return 31}
    if (this.getMonth()==7) {return 31}
    if (this.getMonth()==8) {return 30}
    if (this.getMonth()==9) {return 31}
    if (this.getMonth()==10) {return 30}
    if (this.getMonth()==11) {return 31}
}

Date.prototype.monthName = function(){
    if (this.getMonth()==0) {return "Gennaio"}
    if (this.getMonth()==1) {return "Febbraio"} 
    if (this.getMonth()==2) {return "Marzo"}
    if (this.getMonth()==3) {return "Aprile"}
    if (this.getMonth()==4) {return "Maggio"}
    if (this.getMonth()==5) {return "Giugno"}
    if (this.getMonth()==6) {return "Luglio"}
    if (this.getMonth()==7) {return "Agosto"}
    if (this.getMonth()==8) {return "Settembre"}
    if (this.getMonth()==9) {return "Ottobre"}
    if (this.getMonth()==10) {return "Novembre"}
    if (this.getMonth()==11) {return "Dicembre"}
}

Date.prototype.dayOfWeek = function(){
    if (this.getDay()==0) {return "Lun"}
    if (this.getDay()==1) {return "Mar"} 
    if (this.getDay()==2) {return "Mer"}
    if (this.getDay()==3) {return "Gio"}
    if (this.getDay()==4) {return "Ven"}
    if (this.getDay()==5) {return "Sab"}
    if (this.getDay()==6) {return "Dom"}
}


var current = new Date();

function clearCalendar(){
    for(let i=0; i<6; i++){
        for(let j=0; j<7; j++){
            document.getElementById(i.toString()+j.toString()).innerHTML="";
        }
    }
}

function displayCalendar(d){

    console.log("Full date: " + d.getDate() + " / " + d.getMonth() + " / " + d.getFullYear());
    console.log("Giorno della settimana: " + d.dayOfWeek() + " (" + d.getDay() + ")");

    document.getElementById("month").innerHTML=d.monthName();
    document.getElementById("year").innerHTML=d.getFullYear();

    clearCalendar();

    var c=1;
    
    let j=0;
    if(d.getDay()==0){
        j=6;
    }else{
        j=d.getDay()-1;
    }

    for(j; j<7; j++){
        document.getElementById("0" + j.toString()).innerHTML=c;
        c++;
    }
    for(let i=1; i<6; i++){
        for(j=0; j<7; j++){
            if(c!=d.allMonthDays()+1){
                document.getElementById(i.toString() + j.toString()).innerHTML=c;
                c++;
            }else{
                break;
            }
        }
    }
}

function nextMonth(){
    var month = current.getMonth();
    current.setMonth(month + 1);
    displayCalendar(new Date(current.getFullYear(), current.getMonth()));
}

function previousMonth(){
    var month = current.getMonth();
    current.setMonth(month - 1);
    displayCalendar(new Date(current.getFullYear(), current.getMonth()));
}

displayCalendar(new Date(current.getFullYear(), current.getMonth(), 1));


