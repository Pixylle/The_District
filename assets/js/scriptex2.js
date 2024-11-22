




function TableMultiplication() {
    var myTableau = [];  
    let x = prompt("Entrez votre number");
    for (i=1; i<10; i++) {
        myTableau.push(x + "*" + i + "=" + x*i);  

    }
   //alert(myTableau.join('\n'));
   document.getElementById("result").innerHTML = "<pre>" + myTableau.join('<br>') + "</pre>";


}

