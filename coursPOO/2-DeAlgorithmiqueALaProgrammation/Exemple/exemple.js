class Personnage{

    constructor(nom,age,sexe){
        this.nom = nom;
        this.age = age;
        this.sexe = sexe;
    }

    getNom(){return this.nom;}
    setNom(nom){this.nom = nom;}

    getAge(){return this.age;}
    setAge(age){this.age = age;}

    getSexe(){return this.sexe;}   
    setSexe(sexe){this.sexe = sexe;}

    disBonjour(){
        console.log("Bonjour, c'est moi " + this.nom);
    }
}

var perso1 = new Personnage("Tya",22,false);
console.log(perso1.getNom());
perso1.setNom("Titi");
console.log(perso1.getNom());
perso1.disBonjour();