<?php


include_once 'connectionDb.php';

class requete extends connectionDb
{
	private $dbConnectionArray;
	private $columnArray;
	private $valueArray;
	private $tableName;
	private $queryDb;
	private $connectTable;
	private $condition;
	private $setArray;
	private $left;

	public function __construct($dbConnectionArray, $columnArray, $valueArray, $tableName, $left, $condition = '1 ')
	{
		$this->db = parent::__construct($dbConnectionArray[0], $dbConnectionArray[1], $dbConnectionArray[2], $dbConnectionArray[3]);
		$this->columnArray = $columnArray;
		$this->valueArray = $valueArray;
		$this->tableName =$tableName;
		$this->queryDb = '';
		$this->condition = $condition;
		$this->setArray = setArrayFct($this->columnArray, $this->valueArray);
		$this->left = $left;
	}

	public function __set($property, $value)
	{
		if(property_exists('requete', $property))
			$this->$property = $value;
		else
			throw new Exception("property invalid", 1);
	}

	public function __get($property)
	{
		if (property_exists('requete', $property))
			return($this->$property);
		else
			throw new Exception("property invalid", 1);
	}

	public function selectDb()
	{

			$this->queryDb = $this->db->prepare('SELECT '.arrayPrepare($this->columnArray, '').' FROM '.$this->tableName.$this->left.' WHERE '.$this->condition.'AND 1');
			var_dump('SELECT '.arrayPrepare($this->columnArray, '').' FROM '.$this->tableName.$this->left.' WHERE '.$this->condition.'AND 1');
			$this->queryDb->execute();
	}

	public function insertDb()
	{
		$this->queryDb = $this->db->prepare('INSERT INTO '.$this->tableName.'('.arrayPrepare($this->columnArray, '').') VALUES ('.arrayPrepare($this->columnArray, ':').')');
		var_dump('INSERT INTO '.$this->tableName.'('.arrayPrepare($this->columnArray, '').') VALUES ('.arrayPrepare($this->columnArray, ':').')');
		$this->arrayBindParam($this->columnArray);
		$this->queryDb->execute();
	}

	public function updateDb()
	{
		$this->queryDb = $this->db->prepare('UPDATE '.$this->tableName.' SET '.arrayPrepare($this->setArray, '').' WHERE 1 AND '.arrayPrepare($this->condition, ':').' 1');
		$this->arrayBindParam($this->condition);
		$this->queryDb->execute();
	}

	public function deleteDb()
	{
		$this->queryDb = $this->db->prepare('DELETE FROM '.$this->tableName.' WHERE 1 AND '.arrayPrepare($this->condition, '').' 1');
		$this->arrayBindParam($this->condition);
		$this->queryDb->execute();
	}

	public function arrayBindParam($array)
	{
		foreach ($array as $key => $value) {
			$this->queryDb->bindParam(':'.$value, $this->valueArray[$key]);
		}
	}
}

?>