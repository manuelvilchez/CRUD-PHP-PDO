<?php 
class db
{
	public $mysql =null;

	function __construct()
	{
		try
		{
			$this->mysql=$this->getConnection();
		}
		catch(PDOException $ex)
		{
			echo  $ex->getMessage();
		}
	}

	private function getConnection()
	{
		$host="localhost";
		$user="root";
		$pass="LOKOporti_23";
		$database="formulario";
		$charset="utf8mb4";

		$opt=[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

		$pdo= new pdo("mysql:host={$host}; dbname={$database}; charset={$charset}", $user, $pass, $opt);
		$pdo-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::ERRMODE_EXCEPTION);

		return $pdo;

	}
}


 ?>