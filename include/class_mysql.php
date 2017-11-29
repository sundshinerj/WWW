<?php
//version 1.0


define(MYSQL_HOST, '127.0.0.1');
define(MYSQL_USER, 'root');
define(MYSQL_PASS, 'root');
define(MYSQL_CHARSET, 'utf8');
define(MYSQL_DB, 'xedaojia_ams');

class mysql{
	private $conn;
	
	public function __construct(){
		$this->conn = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS);
		if (!$this->conn) {
			die(mysql_error());
		}
		mysqli_set_charset($this->conn,MYSQL_CHARSET);
		mysqli_select_db($this->conn,MYSQL_DB);
	}
	
	protected function close_conn(){
		mysql_close($this->conn);
	}
	
	protected function exec_query($query){
		$result = mysqli_query($this->conn,$query);
		return $result;
	}
	
	public function select($column, $table, $where = 1){
		$query = 'select '.$column.' from '.$table. ' where '.$where;
		$result = $this->exec_query($query);
		//print_r($query);
		if ($result) {
			$rownum = mysqli_num_rows($result);
			if ($rownum == 1) {
				$row = mysqli_fetch_assoc($result);
				$rows = array();
				$rows[0] = $row;
				return $rows;
			}
			elseif ($rownum > 1) {
				$rows = array();
				for ($i = 0; $i < $rownum; $i++) {
					$rows[$i] = mysqli_fetch_assoc($result);
				};
				return $rows;
			}
		}
		else {
			return mysqli_error();
		}
	}
	
	public function insert($column, $table, $value, $getid = false){
		$query = 'insert into '.$table.'('.$column.') value ('.$value.')';
		//var_dump($query);
		$result = $this->exec_query($query);
		if ($result) {
			if ($getid) {
				return mysql_insert_id();
			}
			else {
				return $result;
			}
		}
		else {
			return mysql_error();
		}
	}
	
	public function update($table, $set, $where){
		$query = 'update '.$table.' set '.$set.' where '.$where;
		$result = $this->exec_query($query);
        //print_r($query);
        if ($result) {
			return $result;
		}
		else {
			return mysql_error();
		}
	}
	
	public function delete($table, $where){
		$query = 'delete from '.$table.' where '.$where;
		//print_r($query);
		$result = $this->exec_query($query);
		if ($result) {
			return $result;
		}
		else {
			return mysql_error();
		}
	}
}
?>
