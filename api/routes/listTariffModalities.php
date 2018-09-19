<?php

function listTariffModalities(){

	$sqlListTariffModalities = "SELECT TM.ID AS tariffModalityId, TM.NAME AS tariffModalityName
			                        FROM TARIFF_MODALITY AS TM
			                        WHERE 1";

	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlListTariffModalities);
			$stmt->execute();
      $tariffModalities = $stmt->fetchAll(PDO::FETCH_OBJ);

      //RESPONSE
      $response = new stdClass();
      $response->status = 1;
      $response->statusMessage = "Dados recuperados com sucesso.";

      $response->tariffModalities = $tariffModalities;

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
