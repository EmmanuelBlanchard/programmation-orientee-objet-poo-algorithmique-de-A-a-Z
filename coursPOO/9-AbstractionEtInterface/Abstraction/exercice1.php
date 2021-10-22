<?php
abstract class Personnage{
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

    abstract protected function calculDegat();

    public function afficherDegat(){
        echo "Dégats infligés : " . $this->calculDegat() . " dégats <br />";
    }

    public function __toString() {
        $texte = "Mon nom est : " . $this->nom . " <br />";
        $texte .= "Ma classe est : " . $this->classe . " <br />";
        $texte .= "J'inflige : " . $this->attaque . " dégats <br />";
        $texte .= "J'ai : " . $this->pointsDeVie . " points de vie <br />";
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

    protected function calculDegat(){
        return $this->pointsDeVie / 100 * $this->attaque +1;
    }
}


class Zombie extends Personnage{
    private $vitesse;
    private const DEGATZOMBIE = 10;

    public function __construct($nom,$classe,$pointsDeVie,$forceDuBien,$vitesse){
        parent::__construct($nom,$classe,self::DEGATZOMBIE,$pointsDeVie,$forceDuBien);
        $this->vitesse = $vitesse;
    }

    public function setVitesse($vitesse){
        $this->vitesse = $vitesse;
    }

    public function calculDegat(){
        return $this->attaque;
    }

    public function afficherDegat(){
        echo "Dégats infligés : " . $this->calculDegat() . " dégats <br />";
    }

    public function __toString(){
        $texte = "zombie en approche ! <br />";
        $texte .= parent::__toString();
        $texte .= "Ma vitesse : " .$this->vitesse . " <br />";
        return $texte;
    }
}

class Jeu{
    private $nom;
    private $tableauZombies;
    private $tableauHumains;

    public function __construct($nom){
        $this->nom = $nom;
    }

    public function ajouterZombie($zombie){
        $this->tableauZombies[] = $zombie;
    }

    public function ajouterHumains($humain){
        $this->tableauHumains[] = $humain;
    }

    public function __toString(){
        $texte = "Nom du jeu : " . $this->nom . " <br />";
        $texte .= "************************* : <br />";
        $texte .= "Voici la liste des zombies : <br />";
        for($i = 0; $i < count($this->tableauZombies); $i++){
            $texte .= "************************* : <br />";
            $texte .= $this->tableauZombies[$i] ." <br/>";
        }
        $texte .= "Voici la liste des humains : <br />";
        for($i = 0; $i < count($this->tableauHumains); $i++){
            $texte .= "************************* : <br />";
            $texte .= $this->tableauHumains[$i] ." <br/>";
        }
        return $texte;
    }
}

$perso1 = new Humain("Milo","guerrier",10,100,true,2);
$perso2 = new Humain("Tya","archère",5,50,true,3);
$perso3 = new Humain("Lili","archère",5,55,false,2);
$perso4 = new Humain("Gael","voleur",2,10,false,1);

$zombie1 = new Zombie("z1","zombie",100,false,4);
$zombie2 = new Zombie("z2","zombie",100,false,10);
$zombie3 = new Zombie("z3","zombie",100,false,10);
$zombie4 = new Zombie("z4","zombie",100,false,10);
$zombie5 = new Zombie("z5","zombie",100,false,10);

// Zombie::afficherZombies();

$monJeu = new Jeu("Jeu MGA");

$monJeu->ajouterZombie($zombie1);
$monJeu->ajouterZombie($zombie2);
$monJeu->ajouterZombie($zombie3);
$monJeu->ajouterZombie($zombie4);
$monJeu->ajouterZombie($zombie5);

$monJeu->ajouterHumains($perso1);
$monJeu->ajouterHumains($perso2);
$monJeu->ajouterHumains($perso3);
$monJeu->ajouterHumains($perso4);

echo $monJeu;

?>