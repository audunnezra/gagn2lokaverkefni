<?php

class QueryBuilder
{
	protected $pdo;

	protected $table = "";

	protected $condition = "";

	protected $columns = "*";

	public function __construct()
	{
		$this->pdo = Connection::make();
	}

	public function columns($columns)
	{
		$this->columns = implode(",",$columns);

		return $this;
	}

	public function from($tableName)
	{
		$this->table = $tableName;

		return $this;
	}

	public function where($column, $operator, $value)
	{
		$this->condition = "{$column} {$operator} {$value}";

		return $this;
	}

	public function get()
	{
		$query = "SELECT {$this->columns} FROM {$this->table}";

		if($this->condition != "") {
			$query = $query . " WHERE {$this->condition}";
		}

		$statement = $this->pdo->prepare($query);
		$statement->execute();

		$this->condition = "";
		$this->table = "";
		$this->columns = "*";

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function all($tableName)
	{
		$this->table = $tableName;

		$statement = $this->pdo->prepare("SELECT * FROM {$tableName}");
		
		$statement->execute();
		
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function raw($query)
	{
		$statement = $this->pdo->prepare($query);
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
}