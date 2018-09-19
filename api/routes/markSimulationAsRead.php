<?php

function markSimulationAsRead(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

	$sqlSimulationInsert = "UPDATE SIMULATION AS S SET S.READ = 1 WHERE MD5(S.ID) = :simulationId";

  try{
      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlSimulationInsert);
      $stmt->bindParam("simulationId",$json->simulationId);
      $stmt->execute();
      $lastInsertId = $conn->lastInsertId();
      $affectedData = $stmt->rowCount(); //número de linhas afetadas

      if ($affectedData > 0) {

        $response = new stdClass();
        $response->status = 1;
        $response->statusMessage = "Registro alterado com sucesso.";

      }else{

        $response = new stdClass();
        $response->status = 2;
        $response->statusMessage = "Não foi possível alterar o registro ou não foram enviadas alterações.";
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
