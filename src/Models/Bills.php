<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Bills extends Model
{
    protected $table = 'bills';
    protected $columns = [
        'id_user',	
	    'name_user',
		'price',
		'phone',
		'address',
		'status',
		'pay_method',
		'time_create',	
		'time_update',	
		'note'
    ];

	public function updateBills($id, $status)
	{
		$sql = "UPDATE $this->table SET status = :status WHERE id = :id";


		$stmt = $this->conn->prepare($sql);

		$stmt->bindParam(':id', $id);

		$stmt->bindParam(':status', $status);

		$stmt->execute();
	}

	public function getBillUser($id) {
		$sql = "SELECT * FROM $this->table WHERE id_user = :id_user";

		$stmt = $this->conn->prepare($sql);

		$stmt->bindParam(':id_user', $id);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function countBills() {
		$sql = "SELECT COUNT(*) FROM $this->table";

		$stmt = $this->conn->prepare($sql);

		$stmt->execute();

		return $stmt->fetchColumn();
	}

   
}