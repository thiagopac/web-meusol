<?php

function listBookings(){

	$sqlBookingsSelect = "SELECT BK.ID AS bookingId, BK.CNPJ AS bookingCnpj, BK.COMPANY_NAME AS bookingCompanyName, BK.DIN AS bookingDate, BK.IS_CUSTOMER AS bookingCustomer,
													BK.INSTALLATION_CONSUMER AS bookingInstalationConsumer, BK.RESPONSIBLE_NAME AS bookingResponsibleName, BK.RESPONSIBLE_EMAIL AS bookingResponsibleEmail,
													BK.RESPONSIBLE_PHONE AS bookingResponsiblePhone, S.NAME AS subclassName, TM.NAME AS tariffModalityName, T.VALUE AS tariffValue, P.NAME AS planName,
													BK.APPROVED AS bookingApproved, BK.ACCEPTED AS bookingAccepted
												FROM BOOKING AS BK
												JOIN TARIFF_RULE AS TR ON TR.ID = BK.TARIFF_RULE_ID
												JOIN SUBCLASS AS S ON S.ID = TR.SUBCLASS_ID
												JOIN TARIFF_MODALITY AS TM ON TM.ID = TR.TARIFF_MODALITY_ID
												JOIN TARIFF AS T ON T.ID = TR.TARIFF_ID
												JOIN PLAN AS P ON P.ID = BK.PLAN_ID
												WHERE 1
												ORDER BY BK.ID DESC";
	try{
			$conn = getConn();

			//SQL AND BIND
			$stmt = $conn->prepare($sqlBookingsSelect);
			$stmt->execute();
      $bookings = $stmt->fetchAll(PDO::FETCH_OBJ);
			$count = $stmt->rowCount(); //número de linhas afetadas

			if ($count > 0) {

				//RESPONSE
	      $response = new stdClass();
	      $response->status = 1;
	      $response->statusMessage = "Dados recuperados com sucesso.";

	      $response->bookings = $bookings;

			}else{

				//RESPONSE
				$response = new stdClass();
				$response->status = 2;
				$response->statusMessage = "Não foi possível recuperar os registros.";
			}

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
