<?php

include_once 'input.php';

class formulaire {
	
	private $formDebut;
	private $formFin;
	private $arrayNameInput;
	private $arrayTypeInput;
	private $arrayClassesInput;
	private $arrayValueInput;


	public function __construct($actionForm, $methodForm, $nameForm, $arrayNameInput, $arrayTypeInput, $arrayValueInput, $arrayClassesInput)
	{
		$this->formDebut = '<form action="'.$actionForm.'" method="'.$methodForm.'" name="'.$nameForm.'">';
		$this->arrayNameInput = $arrayNameInput;
		$this->arrayTypeInput = $arrayTypeInput;
		$this->arrayClassesInput = $arrayClassesInput;
		$this->arrayValueInput = $arrayValueInput;
		$this->formFin = '</form>';
	}

	public function __set($property, $value)
	{
		if(property_exists('formulaire', $property))
			$this->$property = $value;
		else
			throw new Exception("property invalid", 1);
	}

	public function __get($property)
	{
		if (property_exists('formulaire', $property))
			return($this->$property);
		else
			throw new Exception("property invalid", 1);
	}

	public function arrayInputs($arrayNameInput, $arrayTypeInput, $arrayValueInput, $arrayClassesInput)
	{
		$input = '';
		foreach ($arrayNameInput as $key => $value) {
			$tmp = new input($arrayNameInput[$key], $arrayTypeInput[$key], $arrayValueInput[$key], $arrayClassesInput[$key]);
			$input .= $tmp->assembleInput();
		}
		return $input;
	}

	public function displayForm()
	{
		if(count($this->arrayNameInput) === count($this->arrayTypeInput) && count($this->arrayNameInput) === count($this->arrayClassesInput) && count($this->arrayNameInput) === count($this->arrayValueInput))
		{
			echo $this->formDebut;
			echo $this->arrayInputs($this->arrayNameInput, $this->arrayTypeInput, $this->arrayValueInput, $this->arrayClassesInput);
			echo $this->formFin;
		}
		else {
			echo "form non cree";
		}
	}
}

?>