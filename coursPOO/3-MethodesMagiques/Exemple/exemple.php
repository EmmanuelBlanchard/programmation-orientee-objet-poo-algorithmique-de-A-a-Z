<?php
class Personnage{
    private $nom;
    private $age;
    private $sexe;

    public function __construct($nom,$age,$sexe){
        $this->nom = $nom;
        $this->age = $age;
        $this->sexe = $sexe;
    }

    public function getNom(){return $this->nom;}
    public function setNom($nom){$this->nom = $nom;}

    public function getAge(){return $this->age;}
    public function setAge($age){$this->age = $age;}

    public function getSexe(){return $this->sexe;}   
    public function setSexe($sexe){$this->sexe = $sexe;}

    public function disBonjour(){
        echo "Bonjour, c'est moi " . $this->nom . "<br />";
    }

    public function __toString() {
        $texte = "Bonjour, c'est moi " .$this->nom . " <br />";
        $texte .= "Mon age est de : ".$this->age . " ans <br />";
        $texte .= ($this->sexe) ? "Je suis un homme <br />" : "Je suis une femme <br />";
        return $texte;
    }

}

$perso1 = new Personnage("Tya",22,false);
echo $perso1;

?>