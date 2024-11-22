var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];

document.addEventListener("DOMContentLoaded", function() {
  displayInitialArray();
});

function displayInitialArray() {
  document.getElementById("arrayDisplay1").innerText = tab.join('\n');
}

function displayArray() {
  document.getElementById("arrayDisplay1").innerText = tab.join('\n');
}

function remove() {
  let nom = prompt("Entrez le prenom");
  let index = tab.indexOf(nom);

  if (index !== -1) {
    for (let i = index; i < tab.length - 1; i++) {
      tab[i] = tab[i + 1];
    }
    tab[tab.length - 1] = ""; 
    alert(`Le prenom ${nom} était supprimé`);
  } else {
    alert(`Erreur: le prenom ${nom} n'était pas trouvé.`);
  }

  displayArray();
}
