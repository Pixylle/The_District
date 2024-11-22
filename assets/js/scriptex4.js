let i = 0;
let tot = 0;

function ajout(button, x) {
    let parentDiv = button.parentElement;
    let textElement = parentDiv.querySelector('p');
    let text = textElement.innerHTML.trim(); // Используем innerHTML для сохранения форматирования
    let parent = document.getElementById('panier');
    let newDiv = document.createElement('div');
    
    // Добавляем текст содержимого элемента 'p' в новый 'div'
    newDiv.innerHTML = text;

    // Вставляем новый 'div' в нужное место
    if (parent.children.length >= 2) {
        parent.insertBefore(newDiv, parent.children[1]);
    } else {
        parent.appendChild(newDiv);
    }

    let inp = parentDiv.querySelector('input[type="number"]');
    let qtecom = inp.value;
    let pu = x;

    calculate(pu, qtecom);
}

function calculate(pu, qtecom) {
    i++;

    let qte = parseInt(qtecom, 10);
    if (isNaN(qte) || qte <= 0) {
        alert("Quantité non valide!");
        return;
    }

    let subtotal = pu * qte;

    if (i === 1) {
        tot = 0;
    }

    tot += subtotal;

    let rem = 0;
    if (tot >= 100) {
        if (tot <= 200) {
            rem = tot * 0.05;
        } else {
            rem = tot * 0.10;
        }
    }

    tot -= rem;

    let port = 0;
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
