function calculate() {
   let pu = document.getElementById("prix").value;
   let qtecom = document.getElementById("quan").value;

   function pay(pu, qtecom) {
       let tot = pu * qtecom;
       let port = 0;
       let rem = 0;

       if (tot >= 100) {
           if (tot <= 200) {
               rem = tot * 0.05; 
           } else {
               rem = tot * 0.10; 
           }
       } else {
           rem = 0;
       }

       tot -= rem; 

       if (tot > 500) {
           port = 0;
       } else {
           port = tot * 0.02; 
           if (port < 6) {
               port = 6; 
           }
       }

       tot += port; 

       
       document.getElementById("remise").innerHTML = "Remise sur votre commande: " + rem.toFixed(2) + " €";
       document.getElementById("port").innerHTML = "Livraison: " + port.toFixed(2) + " €";
       document.getElementById("total").innerHTML = "PAP: " + tot.toFixed(2) + " €";
   }

   pay(pu, qtecom);
}