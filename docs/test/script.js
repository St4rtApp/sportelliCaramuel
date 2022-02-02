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
    if (this.getDay()==0) {return "Dom"}
    if (this.getDay()==1) {return "Lun"}
    if (this.getDay()==2) {return "Mar"}
    if (this.getDay()==3) {return "Mer"}
    if (this.getDay()==4) {return "Gio"}
    if (this.getDay()==5) {return "Ven"}
    if (this.getDay()==6) {return "Sab"}
}


//Nuovo oggetto data
var current = new Date();


//Funzione per svuotare il calendario
function clearCalendar(){
    for(let i=0; i<42; i++){
      document.getElementsByTagName("td")[i].innerHTML="";
    }
}


//Togliere stile agli elementi vuoti (bianchi) del calendario
function clearStyle(){
    for(let i=0; i<42; i++){
      if(	document.getElementsByTagName("td")[i].innerHTML==""){
      	document.getElementsByTagName("td")[i].className="";
      }else{
        document.getElementsByTagName("td")[i].className = "rounded-full items-center justify-center hover:bg-gray-300 hover:shadow-outline days cursor-pointer py-1";
        document.getElementsByTagName("td")[i].classList.add("unselectable");
      }
    }
}


//Riempimento calendario con giorni del mese
function displayCalendar(d){

    console.log("Full date: " + d.getDate() + " / " + d.getMonth() + " / " + d.getFullYear());
    console.log("Giorno della settimana: " + d.dayOfWeek() + " (" + d.getDay() + ")");

    document.getElementById("month").innerHTML=d.monthName();
    document.getElementById("year").innerHTML=d.getFullYear();

    clearCalendar();

    let i;

    if(d.getDay()==0){
      i=6;
    }else{
      i=d.getDay()-1;
    }

    console.log(d.getDay());
    for(let j=0; j<d.allMonthDays(); i++, j++){
      document.getElementsByTagName("td")[i].innerHTML=(j+1);
    }

    clearStyle();
}


//Aggiornamento calendario al prossimo mese rispetto a quello visualizzato
function nextMonth(){
    var month = current.getMonth();
    current.setMonth(month + 1);
    displayCalendar(new Date(current.getFullYear(), current.getMonth()));
}

//Aggiornamento calendario al mese precedente rispetto a quello visualizzato
function previousMonth(){
    var month = current.getMonth();
    current.setMonth(month - 1);
    displayCalendar(new Date(current.getFullYear(), current.getMonth()));
}



displayCalendar(new Date(current.getFullYear(), current.getMonth()));
