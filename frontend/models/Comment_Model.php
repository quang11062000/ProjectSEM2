<?php
class Comment_Model extends Base_Model
{
	protected $table = 'comments';

	function find_group_by()
	{
		$query = "select product_id from `{$this->table}` group by `product_id`";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
	function find_product_by_comment($id)
	{
		$query = "select * from `{$this->table}` where `product_id` = {$id}";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetchAll(PDO::FETCH_ASSOC);
		$sth->closeCursor();
		return $data;
	}
}
