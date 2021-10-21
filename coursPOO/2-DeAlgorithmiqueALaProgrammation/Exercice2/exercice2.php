<?php
class Livre{
    public $titre;
    public $nombreDePages;
    private $couleurCouverture;
    private $estTraduitEnAnglais;
    
    public function __construct($titre,$nombreDePages,$couleurCouverture,$estTraduitEnAnglais){
        $this->titre = $titre;
        $this->nombreDePages = $nombreDePages;
        $this->couleurCouverture = $couleurCouverture;
        $this->estTraduitEnAnglais = $estTraduitEnAnglais;
    }

    public function getTitre(){return $this->titre;}
    public function setTitre($titre){$this->titre = $titre;}

    public function getNombreDePages(){return $this->nombreDePages;}
    public function setNombreDePages($nombreDePages){$this->nombreDePages = $nombreDePages;}

    public function getCouleurCouverture(){return $this->couleurCouverture;}   
    public function setCouleurCouverture($couleurCouverture){$this->couleurCouverture = $couleurCouverture;}

    public function getEstTraduitEnAnglais(){return $this->estTraduitEnAnglais;}   
    public function setEstTraduitEnAnglais($estTraduitEnAnglais){$this->estTraduitEnAnglais = $pointsDeVie;}

    private function traductionAnglaise(){
        return $this->estTraduitEnAnglais = true;
    }

    public function afficherLivre(){
        echo "Livre : " . $this->titre . " <br />"; 
        echo "Nombre de pages : " . $this->nombreDePages . " pages <br />"; 
        echo "Couverture de couleur : " .$this->couleurCouverture . " <br />";
        if($this->estTraduitEnAnglais) {
            echo "Livre traduit en anglais. <br />";
        } else {
            echo "Livre non traduit en anglais. <br />";
        }
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

$livre1 = new Livre("l'algorithmique selon H2PROG",500,"noir",true);
$livre1->afficherLivre();
echo "************************ <br />";
$livre1->titre = "algo H2PROG";
$livre1->nombreDePages = 10;
$livre1->ajouterNombreDePages(10);
$livre1->setCouleurCouverture("rose");
$livre1->basculerEnAglais();
$livre1->afficherLivre();

?>