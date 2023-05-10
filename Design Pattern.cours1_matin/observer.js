class Observable {
  constructor() {
    this.observers = [];
  }

  addObserver(observer) {
    this.observers.push(observer);
  }

  removeObserver(observer) {
    const index = this.observers.indexOf(observer);
    if (index > -1) {
      this.observers.splice(index, 1);
    }
  }

  notify(data) {
    this.observers.forEach(observer => observer.update(data));
  }
}

class Observer {
  update(data) {
    console.log(`Received data: ${data}`);
  }
}

// Création d'un observable
const observable = new Observable();

// Création de deux observateurs
const observer1 = new Observer();
const observer2 = new Observer();

// Ajout des observateurs à l'observable
observable.addObserver(observer1);
observable.addObserver(observer2);

// Notification des observateurs
observable.notify("Hello world!");
// Output:
// Received data: Hello world!
// Received data: Hello world!

// Suppression d'un observateur
observable.removeObserver(observer2);

// Notification des observateurs restants
observable.notify("Goodbye!");
// Output:
// Received data: Goodbye!


/*
  Le pattern "Observer" permet à un objet, appelé "sujet", de notifier un groupe d'objets, appelés "observateurs", lorsqu'un événement se produit. Les observateurs peuvent alors réagir à cet événement selon leurs besoins.
  Dans cet exemple, la classe "Observable" est le sujet qui notifie ses observateurs lorsqu'une donnée est mise à jour à l'aide de la méthode "notify". Les observateurs, "Observer", réagissent à l'événement en appelant leur méthode "update". La méthode "addObserver" permet d'ajouter un observateur à la liste des observateurs du sujet, tandis que la méthode "removeObserver" permet de le supprimer de cette liste.
*/