<?php

function managerCreateUser(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

  $sqlCompanySelect = "SELECT CO.ID AS companyId FROM COMPANY AS CO WHERE CO.CNPJ = :companyCnpj AND CO.INSTALLATION_CONSUMER = :companyInstallationConsumer";

  $sqlUserInsert = "INSERT INTO USER (EMAIL, PASSWORD, COMPANY_ID)
                    VALUES (:userEmail, MD5(:userPassword), :companyId)";

  try{
      $conn = getConn();

      //SELECT
      //SQL AND BIND
			$stmt = $conn->prepare($sqlCompanySelect);
			$stmt->bindParam("companyCnpj",$json->companyCnpj);
      $stmt->bindParam("companyInstallationConsumer",$json->companyInstallationConsumer);
      $stmt->execute();
      $company = $stmt->fetch(PDO::FETCH_OBJ);
      $count = $stmt->rowCount(); //número de linhas afetadas

      if ($count > 0) {

        //INSERT
        //SQL AND BIND
        $stmt = $conn->prepare($sqlUserInsert);
        $stmt->bindParam("userEmail",$json->userEmail);
        $stmt->bindParam("userPassword",$json->userPassword);
        $stmt->bindParam("companyId",$company->companyId);
        $stmt->execute();
        $affectedData = $stmt->rowCount(); //número de linhas afetadas

        //debug
        // echo json_encode($json, JSON_NUMERIC_CHECK);
        // exit;

        if ($company != null) {

          $response = new stdClass();
          $response->status = 1;
          $response->statusMessage = "Registro inserido com sucesso.";

          $response->feedbackStatus = "success";
          $response->feedbackTitle = "Sucesso";
          $response->feedbackMessage = "Login criado com sucesso.";

        }else{

          $response = new stdClass();
          $response->status = 2;
          $response->statusMessage = "Não foi possível inserir o registro.";

          $response->feedbackStatus = "error";
          $response->feedbackTitle = "Erro";
          $response->feedbackMessage = "Verifique os dados informados. Não foi possível criar o login.";
        }

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
