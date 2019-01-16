<?php

include_once 'class.php';

class input {
	
	private $nameInput;
	private $typeInput;
	private $input;
	private $classInput;

	public function __construct($nameInput, $typeInput, $classInput)
	{
		$this->nameInput = $nameInput;
		$this->typeInput = $typeInput;
		$this->classInput = $classInput; 
	}
    public function makeClasses($classInput){
		$classInput= new classes($classInput);
		$classInput= $classInput->assembleClasses();
		return $classInput;
    }
	public function __set($property, $value)
	{
		if(property_exists('input', $property))
			$this->$property = $value;
		else
			throw new Exception("property invalid", 1);
	}

	public function __get($property)
	{
		if (property_exists('input', $property))
			return($this->$property);
		else
			throw new Exception("property invalid", 1);
	}

	public function assembleInput()
	{
		$this->input = '<input '.$this->makeClasses($this->classInput).' type="'.$this->typeInput.'" name="'.$this->nameInput.'"'.($this->typeInput == "submit" ? 'value="'.$this->nameInput.'">' : ">").'';
		return $this->input;
	}
}

?>