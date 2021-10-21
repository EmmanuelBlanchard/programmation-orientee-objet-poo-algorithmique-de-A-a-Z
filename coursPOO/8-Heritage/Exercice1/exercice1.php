<?php
class Personnage{
    private $nom;
    private $classe;
    protected $attaque;
    protected $pointsDeVie;
    private $forceDuBien;

    public function __construct($nom,$classe,$attaque,$pointsDeVie,$forceDuBien){
        $this->nom = $nom;
        $this->classe = $classe;
        $this->attaque = $attaque;
        $this->pointsDeVie = $pointsDeVie;
        $this->forceDuBien = $forceDuBien;
    }

    public function getNom(){return $this->nom;}
    public function setNom($nom){$this->nom = $nom;}

    public function getClasse(){return $this->classe;}
    public function setClasse($classe){$this->classe = $classe;}

    public function getAttaque(){return $this->attaque;}   
    public function setAttaque($attaque){$this->attaque = $attaque;}

    public function getPointsDeVie(){return $this->pointsDeVie;}   
    public function setPointsDeVie($pointsDeVie){$this->pointsDeVie = $pointsDeVie;}

    public function getForceDuBien(){return $this->forceDuBien;}   
    public function setForceDuBien($forceDuBien){$this->forceDuBien = $forceDuBien;}

    private function calculDegat(){
        return $this->pointsDeVie / 100 * $this->attaque +1;
    }

    public function afficherDegat(){
        echo "Dégats infligés : " . $this->calculDegat() . " dégats <br />";
    }

    public function __toString() {
        $texte = "Mon nom est : " .$this->nom . " <br />";
        $texte .= "Ma classe est : " .$this->classe . " <br />";
        $texte .= "J'inflige : ".$this->calculDegat() . " dégats <br />";
        $texte .= "J'ai : " .$this->pointsDeVie . " points de vie <br />";
        $texte .= ($this->forceDuBien) ? "Je fais partie des forces du bien <br />" : "Je fais partie des forces du mal <br />";
        return $texte;
    }
    
}

class Humain extends Personnage{
    private $niveau;

    public function __construct($nom,$classe,$attaque,$pointsDeVie,$forceDuBien,$niveau){
        parent::__construct($nom,$classe,$attaque,$pointsDeVie,$forceDuBien);
        $this->niveau = $niveau;
    }

    public function __toString() {
        $texte = "";
        $texte .= parent::__toString();
        $texte .= "Mon niveau : " .$this->niveau . " <br />";
        return $texte;
    }

    public function gagneUnNiveau(){
        $this->niveau++;
    }

    public function modificationStatistique($attaque,$pointsDeVie){
        echo "***************************** <br />";
        $this->attaque = $attaque;
        $this->pointsDeVie =$pointsDeVie;
        $this->afficherDegat();
        echo "Mes points de vie sont de : " . $this->pointsDeVie . " <br />";
    }
}

$perso1 = new Humain("Milo","guerrier",10,100,true,2);
$perso2 = new Humain("Tya","archère",5,50,true,3);
$perso3 = new Humain("Lili","archère",5,55,false,2);
$perso4 = new Humain("Gael","voleur",2,10,false,1);
echo $perso1;
echo "***************************** <br />";
echo $perso2;
echo "***************************** <br />";
echo $perso3;
echo "***************************** <br />";
echo $perso4;

$perso1->modificationStatistique(10,30);

?>