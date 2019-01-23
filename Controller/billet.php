<?php 
    class billet{
        private $titre;
        private $mot;

        public function __construct($titre, $mot){
            $this->titre = $titre;
            $this->mot = $mot;
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
            <div class="card-header">'.$this->titre.'</div><div class="card-body"><h4 class="card-title">'.$this->mot.'</h4>
            <input onclick="responsiveVoice.speak("'.$this->mot.'", "French Female");" type="button" value="🔊 Play" /></div><div class="card-footer text-muted d-flex justify-content-between"><button class="likes btn btn-secondary fas fa-thumbs-up"><button class="likes btn btn-danger fas fa-thumbs-down"></div></div>';
        }
   }
?>