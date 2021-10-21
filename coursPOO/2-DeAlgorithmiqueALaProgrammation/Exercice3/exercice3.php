<?php
class Voiture{
    private $marque;
    private $modele;
    private $couleur;
    private $nombreDePortes;
    private $estElectrique;
    
    public function __construct($marque,$modele,$couleur,$nombreDePortes,$estElectrique){
        $this->marque = $marque;
        $this->modele = $modele;
        $this->couleur = $couleur;
        $this->nombreDePortes = $nombreDePortes;
        $this->estElectrique = $estElectrique;
    }

    public function afficherVoiture(){
        echo "******************** <br />";
        echo "Marque : " . $this->marque . " <br />"; 
        echo "Modèle : " . $this->modele . " <br />"; 
        echo "Couleur : " .$this->couleur . " <br />";
        echo "Nombre de portes : " .$this->nombreDePortes . " <br />";
        if($this->estElectrique) {
            echo "Voiture électrique. <br />";
        } else {
            echo "Voiture non électrique. <br />";
        }
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
}

$v1 = new Voiture("Yotota","Ryas","noir",5,true);
$v2 = new Voiture("Yotota","Risau","rouge",3,false);
$v3 = new Voiture("Troen","5C","rouge",5,true);
$tableau = [$v1,$v2,$v3];

for($i = 0; $i < count($tableau); $i++) {
    $tableau[$i]->afficherVoiture();
}

afficherVoitureMarque($tableau,"Yotota");

function afficherVoitureMarque($tableau,$marqueRecherche) {
    echo "******************** <br />";
    echo "Voici les véhicules de la marque : " .$marqueRecherche . " <br />";
    for($i = 0; $i < count($tableau); $i++) {
        if($tableau[$i]->getMarque() === $marqueRecherche) {
            $tableau[$i]->afficherVoiture();
        }
    }
}

?>