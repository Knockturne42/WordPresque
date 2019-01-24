<?php 
    class billet{
        private $titre;
        private $mot;
        private $def; 
        private $mot1;
        private $mot2;

        public function __construct($titre, $mot, $mot1, $mot2, $def){
            $this->titre = $titre;
            $this->mot = $mot;
            $this->mot1 = $mot1;
            $this->mot2 = $mot2;
            $this->def = $def;
            $this->assembleBillet();

        }
        public function __set($property, $value)
        {
            if(property_exists('billet', $property))
                $this->$property = $value;
            else
                throw new Exception("property invalid", 1);
        }
    
        public function __get($property)
        {
            if (property_exists('billet', $property))
                return($this->$property);
            else
                throw new Exception("property invalid", 1);
        }
        public function assembleBillet(){
            echo '<div class="card border-primary mb-3" style="max-width: 20rem;">
            <div class="card-header">'.$this->titre.'</div>
            <div class="card-body d-flex justify-content-between">
            <h4 class="card-title">'.$this->mot.'</h4>
            <button type="button" class="btn btn-primary" onclick="responsiveVoice.speak(\''.$this->mot.'\', \'French Female\');"><i class="fas fa-play"></i></button>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">'.$this->mot1.' + '.$this->mot2.'</li>
                <li class="list-group-item">Définition: '.$this->def.'</li>
            </ul>
            <div class="card-footer text-muted d-flex justify-content-between"><button onclick="clickLike(\'plus'.$this->mot.'\')" id="plus'.$this->mot.'" class="likes btn btn-secondary fas fa-thumbs-up"><button onclick="clickLike(\'moins'.$this->mot.'\')" id="moins'.$this->mot.'" class="likes btn btn-danger fas fa-thumbs-down"></div></div>';
        }
   }
?>