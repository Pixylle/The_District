

let conj=0;
let conm=0;
let cona=0;



function age(){
while(true) {
 
let age = prompt("Entrez l'age du personne")

if (age>=100){ 
    cona++;
    break;
}

 if (age<20){
    conj++;
    console.log(conj);
}

else if (age>40) {
    cona++;
    console.log(cona);
}
 

 else {
    conm++;
    
    console.log(conm);
 }


}

//alert("Au total il y a" + "\n" + "Jeunes:" + conj + "\n" + "Moyens:" + conm + "\n" + "Vieux:"+ cona);

let tot="<b>Au total il y a </b><br> Jeunes:" + conj + 
    "<br>" + "Moyens:" + conm + "<br>" + "Vieux:"+ cona;

let pic=document.getElementById("resu");
pic.src="src/img/ex1.png";

document.getElementById("resutext").innerHTML= tot ;
} 

