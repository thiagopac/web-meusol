<?php

function listDiscounts(){

	$sqlListDiscounts = "SELECT D.ID AS discountId, D.NAME AS discountName, D.DESCRIPTION AS discountDescription, D.VALUE AS discountValue
                        FROM DISCOUNT AS D
                        WHERE 1";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListDiscounts);
			$stmt->execute();
      $discounts = $stmt->fetchAll(PDO::FETCH_OBJ);

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

      $response->discounts = $discounts;

      //OUTPUT
			echo json_encode($response, JSON_NUMERIC_CHECK);

			$conn = null;

	} catch(PDOException $e){

			header('HTTP/1.1 400 Bad request');
			echo json_encode($e->getMessage());

			die();
	}
}

 ?>
