<?php
class Product_Model extends Base_Model
{
	protected $table = 'products';

	function find_by_new_products()
	{
		$query = "select * from {$this->table} order by id desc";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
}
