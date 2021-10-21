<?php
class Voiture{
    private $marque;
    private $modele;
    private $couleur;
    private $nombreDePortes;
    private $estElectrique;
    private $prixTTC;
    
    const MINI = 3;
    const NORMAL = 5;
    const TVA = 20;

    public static $voitures;

    public function __construct($marque,$modele,$couleur,$nombreDePortes,$estElectrique,$prixHT){
        $this->marque = $marque;
        $this->modele = $modele;
        $this->couleur = $couleur;
        $this->nombreDePortes = $nombreDePortes;
        $this->estElectrique = $estElectrique;
        $this->prixTTC = $prixHT + $prixHT * self::TVA / 100;
        self::$voitures[] = $this;
    }

    public function __toString(){
        $texte = "******************** <br />";
        $texte .= "Marque : " . $this->marque . " <br />"; 
        $texte .= "Modèle : " . $this->modele . " <br />"; 
        $texte .= "Couleur : " . $this->couleur . " <br />";
        $texte .= "Nombre de portes : " . $this->nombreDePortes . " <br />";
        if($this->estElectrique) {
            $texte .= "Voiture électrique. <br />";
        } else {
            $texte .= "Voiture non électrique. <br />";
        }
        $texte .= "Prix TTC : " . $this->prixTTC . " <br />";
        return $texte;
    }

    public function getMarque(){return $this->marque;}
    public function setMarque($marque){$this->marque = $marque;}

    public function getModele(){return $this->modele;}
    public function setModele($modele){$this->modele = $modele;}

    public function getCouleur(){return $this->couleur;}   
    public function setCouleur($couleur){$this->couleur = $couleur;}

    public function getNombreDePortes(){return $this->nombreDePortes;}   
    public function setNombreDePortes($nombreDePortes){$this->nombreDePortes = $nombreDePortes;}

    public function getEstElectrique(){return $this->estElectrique;}   
    public function setEstElectrique($estElectrique){$this->estElectrique = $estElectrique;}

    public function getPrix(){return $this->prix;}   
    public function setPrix($prix){$this->prix = $prix;}

    public static function afficherVoitureMarque($marqueRecherche) {
        echo "******************** <br />";
        echo "Voici les véhicules de la marque : " .$marqueRecherche . " <br />";
        for($i = 0; $i < count(self::$voitures); $i++) {
            if(self::$voitures[$i]->getMarque() === $marqueRecherche) {
                echo self::$voitures[$i];
            }
        }
    }
}

$v1 = new Voiture("Yotota","Ryas","noir",Voiture::NORMAL,true,18000);
$v2 = new Voiture("Yotota","Risau","rouge",Voiture::MINI,false,15000);
$v3 = new Voiture("Troen","5C","rouge",Voiture::NORMAL,true,19000);
// $tableau = [$v1,$v2,$v3];

// for($i = 0; $i < count($tableau); $i++) {
//     echo $tableau[$i];
// }

// afficherVoitureMarque($tableau,"Yotota");

for($i = 0; $i < count(Voiture::$voitures); $i++) {
    echo Voiture::$voitures[$i];
}

Voiture::afficherVoitureMarque("Yotota");

// function afficherVoitureMarque($tableau,$marqueRecherche) {
//     echo "******************** <br />";
//     echo "Voici les véhicules de la marque : " .$marqueRecherche . " <br />";
//     for($i = 0; $i < count($tableau); $i++) {
//         if($tableau[$i]->getMarque() === $marqueRecherche) {
//             echo $tableau[$i];
//         }
//     }
// }

?>