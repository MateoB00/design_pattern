let monModule = (function() {
    
    // variables privées
    let mavariablePrivee = "Je suis une variable privée";
    
    // Fonctions privées
    function maFonctionPrivee() {
        console.log("Je suis une fonction privée");
    }
    
    // Fonctions publiques
    return {
        maFonctionPublique: function() {
            console.log("Je suis une fonction publique");
        },
        mavariablePublique: "Je suis une variable publique"
    };
})();

// Utilisation des fonctions publiques
monModule.maFonctionPublique(); // Affiche "Je suis une fonction publique"
console.log(monModule.mavariablePublique); // Affiche "Je suis une variable publique"












/*
Un exemple de design pattern de structure en JavaScript simple est le modèle "Module Pattern". Ce modèle permet d'encapsuler des fonctions et des variables dans des modules, ce qui évite les collisions avec d'autres parties du code et rend le code plus facile à gérer.
Dans cet exemple, nous avons créé un module nommé "monModule". Nous avons encapsulé des variables et des fonctions privées à l'intérieur de la fonction anonyme qui est exécutée immédiatement, ce qui signifie que ces variables et fonctions ne sont pas accessibles en dehors du module.
Ensuite, nous avons retourné un objet avec des fonctions et des variables publiques qui sont accessibles depuis l'extérieur du module.
Les fonctions et les variables publiques permettent d'interagir avec les fonctions et les variables privées.
On ne peut pas accéder aux variables et fonctions privées à l'extérieur du module, ce qui garantit que notre code est sûr et évite les conflits de nommage.
*/