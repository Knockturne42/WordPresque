<?php

class input {
	
	private $nameInput;
	private $typeInput;
	private $input;

	public function __construct($nameInput, $typeInput)
	{
		$this->nameInput = $nameInput;
		$this->typeInput = $typeInput;
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
		$this->input = '<input type="'.$this->typeInput.'" name="'.$this->nameInput.'"'.($this->typeInput == "submit" ? 'value="envoyer">' : ">").'';
		return $this->input;
	}
}

?>