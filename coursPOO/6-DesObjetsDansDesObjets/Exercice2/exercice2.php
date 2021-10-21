<?php

class Bibliothèque{
    private $tableauRomans;
    private $tableauBds;
    private $tableauPoliciers;

    public function __construct(){
    }

    public function ajoutLivre($livre){
        if($livre->getType() === "roman"){
            $this->tableauRomans[] = $livre;
        } else if ($livre->getType() === "bd") {
            $this->tableauBds[] = $livre;
        } else if ($livre->getType() === "policier") {
            $this->tableauPoliciers[] = $livre;
        }
    }

    public function __toString(){
        $texte = ""; 
        $texte .= "********** Romans ********** <br />";
        for($i = 0; $i < count($this->tableauRomans); $i++) {
            $texte .= " " . $this->tableauRomans[$i] . "<br />";
        }
        $texte .= "********** Bds ********** <br />";
        for($i = 0; $i < count($this->tableauBds); $i++) {
            $texte .= " " . $this->tableauBds[$i] . "<br />";
        }
        $texte .= "********** Policiers ********** <br />";
        for($i = 0; $i < count($this->tableauPoliciers); $i++) {
            $texte .= " " . $this->tableauPoliciers[$i] . "<br />";
        }
        return $texte;
    }
}

class Livre{
    public $titre;
    public $nombreDePages;
    private $couleurCouverture;
    private $estTraduitEnAnglais;
    private $type;
    
    public function __construct($titre,$nombreDePages,$couleurCouverture,$estTraduitEnAnglais,$type){
        $this->titre = $titre;
        $this->nombreDePages = $nombreDePages;
        $this->couleurCouverture = $couleurCouverture;
        $this->estTraduitEnAnglais = $estTraduitEnAnglais;
        $this->type = $type;
    }

    public function getTitre(){return $this->titre;}
    public function setTitre($titre){$this->titre = $titre;}

    public function getNombreDePages(){return $this->nombreDePages;}
    public function setNombreDePages($nombreDePages){$this->nombreDePages = $nombreDePages;}

    public function getCouleurCouverture(){return $this->couleurCouverture;}   
    public function setCouleurCouverture($couleurCouverture){$this->couleurCouverture = $couleurCouverture;}

    public function getEstTraduitEnAnglais(){return $this->estTraduitEnAnglais;}   
    public function setEstTraduitEnAnglais($estTraduitEnAnglais){$this->estTraduitEnAnglais = $estTraduitEnAnglais;}

    public function getType(){return $this->type;}   
    public function setType($type){$this->type = $type;}

    private function traductionAnglaise(){
        return $this->estTraduitEnAnglais = true;
    }

    public function __toString(){
        $texte = "Livre : " . $this->titre . " <br />"; 
        $texte .= "Nombre de pages : " . $this->nombreDePages . " pages <br />"; 
        $texte .= "Couverture de couleur : " .$this->couleurCouverture . " <br />";
        if($this->estTraduitEnAnglais) {
            $texte .= "Livre traduit en anglais. <br />";
        } else {
            $texte .= "Livre non traduit en anglais. <br />";
        }
        $texte .= "Type : " . $this->type . " <br />";
        return $texte;
    }

    public function ajouterNombreDePages($nombreAAjouter){
        $this->nombreDePages += $nombreAAjouter;
    }
    
    public function basculerEnAglais(){
        $this->traductionAnglaise();
        $this->ajouterNombreDePages(5);
        $this->setCouleurCouverture("verte");
    }
}

$livre1 = new Livre("l'algorithmique selon H2PROG",500,"noir",true,"roman");
$livre2 = new Livre("l2",100,"noir",true,"roman");
$livre3 = new Livre("l3",200,"noir",true,"bd");
$livre4 = new Livre("l4",300,"noir",true,"bd");
$livre5 = new Livre("l5",400,"noir",true,"policier");
$livre6 = new Livre("l6",600,"noir",true,"policier");

$bibliothequeMGA = new Bibliothèque();
$bibliothequeMGA->ajoutLivre($livre1);
$bibliothequeMGA->ajoutLivre($livre2);
$bibliothequeMGA->ajoutLivre($livre3);
$bibliothequeMGA->ajoutLivre($livre4);
$bibliothequeMGA->ajoutLivre($livre5);
$bibliothequeMGA->ajoutLivre($livre6);

echo $bibliothequeMGA;

?>