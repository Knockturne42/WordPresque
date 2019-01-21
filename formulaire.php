<?php
/* 
    * Class Form
    * Permet de générer un formulaire rapidement
*/


class Form2 {

/*  
    * @var array Données utilisées par le formulaire
*/
    protected $data;

/*
    * @var string Pour entrourer les champs
*/
    public $surround = 'div';
/*
    * @param array $data Données utilisées par le formulaire 
*/
    public function __construct($data = array()) {
        $this->data = $data;

}
/*
    * @param $html string Code html à entourer
    * @return string
*/
    protected function surround($html) { // Renvoi le tag "p" entour de paragraphe //
        return "<{$this->surround}>{$html}</{$this->surround}>"; 
        
}
/* 
    * @param $index string Index de la valeur à récupérer
    * @return string
*/
    protected function getValue($index) { // Index c'est ce qui rend accessible la donnée //
        return isset($this->data[$index]) ? $this->data[$index] : null;

}
/*
    * @param $name string 
    * @return string
*/
    public function text() {
        return $this->surround(
            '<p>' . test . '</p>');

}
/* 
    * @return string
*/
    public function submitLike() {
        return $this->surround('<button class="like" type="submit"> Like </button>');

    }
    public function submitDislike() {
        return $this->surround('<button class="dislike" type="submit"> Dislike </button>');

    }
    public function titre() {
        echo "<h1>".H1."</h1>";
        }
}

?>