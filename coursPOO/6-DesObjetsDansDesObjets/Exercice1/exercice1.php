<?php

class ParcAuto{
    private $nom;
    private $adresse;
    private $tableauVoitures;

    public function __construct($nom,$adresse){
        $this->nom = $nom;
        $this->adresse = $adresse;
    }

    public function ajouterVoiture($voiture) {
        $this->tableauVoitures[] = $voiture;
    }

    public function afficherVoitureMarque($marqueRecherche) {
        echo "******************** <br />";
        echo "Voici les véhicules de la marque : " .$marqueRecherche . " <br />";
        for($i = 0; $i < count($this->tableauVoitures); $i++) {
            if($this->tableauVoitures[$i]->getMarque() === $marqueRecherche) {
                echo $this->tableauVoitures[$i];
            }
        }
    }
}

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

    public function __construct($marque,$modele,$couleur,$nombreDePortes,$estElectrique,$prixHT){
        $this->marque = $marque;
        $this->modele = $modele;
        $this->couleur = $couleur;
        $this->nombreDePortes = $nombreDePortes;
        $this->estElectrique = $estElectrique;
        $this->prixTTC = $prixHT + $prixHT * self::TVA / 100;
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
}

$v1 = new Voiture("Yotota","Ryas","noir",Voiture::NORMAL,true,18000);
$v2 = new Voiture("Yotota","Risau","rouge",Voiture::MINI,false,15000);
$v3 = new Voiture("Troen","5C","rouge",Voiture::NORMAL,true,19000);

echo $v1;
echo $v2;
echo $v3;

$parcMga = new ParcAuto("Parc MGA","12 rue des fleurs");
$parcMga->ajouterVoiture($v1);
$parcMga->ajouterVoiture($v2);
$parcMga->ajouterVoiture($v3);

$parcMga->afficherVoitureMarque("Yotota");

?>