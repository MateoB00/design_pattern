function Person(name, age) {
  this.name = name;
  this.age = age;
  this.sayHello = function() {
    console.log("Hello, my name is " + this.name + " and I'm " + this.age + " years old.");
  }
}

var person1 = new Person("Alice", 25);
var person2 = new Person("Bob", 30);

person1.sayHello(); // Output: "Hello, my name is Alice and I'm 25 years old."
person2.sayHello(); // Output: "Hello, my name is Bob and I'm 30 years old."


/*
Dans cet exemple, la fonction Person est définie comme un constructeur d'objets Person. Le constructeur prend deux paramètres name et age, qui sont utilisés pour initialiser les propriétés name et age de l'objet. Le constructeur crée également une méthode sayHello, qui imprime un message de salutation à la console en utilisant les propriétés name et age de l'objet.

Pour créer un nouvel objet Person, on utilise l'opérateur new suivi de l'appel de la fonction constructeur Person avec les arguments nécessaires. Dans cet exemple, nous créons deux objets Person distincts, person1 et person2, en passant les noms et les âges correspondants.

*/