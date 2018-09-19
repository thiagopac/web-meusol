<?php

function listTariffs(){

	$sqlListTariffs = "SELECT T.ID AS tariffId, T.VALUE AS tariffValue
                        FROM TARIFF AS T
                        WHERE 1";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListTariffs);
			$stmt->execute();
      $tariffs = $stmt->fetchAll(PDO::FETCH_OBJ);

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

      $response->tariffs = $tariffs;

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
