<?php

function managerLogin(){

  $request = \Slim\Slim::getInstance()->request();
	$json = json_decode($request->getBody());

  $sqlCompanySelect = "SELECT CO.ID AS companyId, CO.CNPJ AS companyCnpj, CO.COMPANY_NAME AS companyName, CO.COMMERCIAL_NAME AS companyCommercialName,
                              CO.INSTALLATION_CONSUMER AS companyInstallationConsumer, CO.STREET AS companyStreet, CO.NUMBER AS companyNumer, CO.NEIBORHOOD AS companyNeiboorhood,
                              CO.CITY AS companyCity, CO.STATE AS companyState, CO.ZIPCODE AS companyZipcode, CO.LAT AS companyLatitude, CO.LON AS companyLongitude,
                              CO.REFERRAL_CODE AS companyReferralCode, CO.INACTIVE AS companyInactive, CO.DIN as companyDin
                       FROM COMPANY AS CO
                       WHERE CO.ID = :companyId";

	$sqlUserSelect = "SELECT U.ID AS userId, U.EMAIL as userEmail, U.LAST_LOGIN as userLastLogin, U.COMPANY_ID AS companyId, U.ROLE AS userRole
                            FROM USER AS U
                            JOIN COMPANY AS CO ON CO.ID = U.COMPANY_ID
                            WHERE U.PASSWORD = MD5(:userPassword)
                            AND U.EMAIL = :userEmail
                            AND CO.CNPJ = :companyCnpj";

  $sqlContractSelect = "SELECT CT.ID contractId, CT.START contractStart, CT.END contractEnd, CT.COMPANY_ID companyId, CO.COMPANY_NAME AS companyName, CO.CNPJ as companyCnpj,
															 CT.PLAN_ID planId, P.NAME AS planName,
												       CASE
															 		WHEN CT.STATUS = 0 THEN 'inativo'
																	WHEN CT.STATUS = 1 THEN 'ativo'
																	WHEN CT.STATUS = 2 THEN 'cancelado'
															 END AS contractStatus
												FROM CONTRACT CT
												JOIN COMPANY CO ON CO.ID = CT.COMPANY_ID
												JOIN PLAN P ON P.ID = CT.PLAN_ID
												WHERE CT.COMPANY_ID = :companyId";

  try{
      $conn = getConn();

			$stmt = $conn->prepare($sqlUserSelect);
			$stmt->bindParam("userEmail",$json->userEmail);
      $stmt->bindParam("userPassword",$json->userPassword);
      $stmt->bindParam("companyCnpj",$json->companyCnpj);
			$stmt->execute();
			$user = $stmt->fetch(PDO::FETCH_OBJ);
      $count = $stmt->rowCount(); //número de linhas afetadas

      //debug
      // echo json_encode($json, JSON_NUMERIC_CHECK);
      // exit;

      if ($count > 0) {

        //COMPANY
        $stmt = $conn->prepare($sqlCompanySelect);
        $stmt->bindParam("companyId",$user->companyId);
        $stmt->execute();
        $company = $stmt->fetch(PDO::FETCH_OBJ);

        //CONTRACT
        $stmt = $conn->prepare($sqlContractSelect);
        $stmt->bindParam("companyId",$user->companyId);
        $stmt->execute();
        $contract = $stmt->fetch(PDO::FETCH_OBJ);

        $response = new stdClass();
        $response->status = 1;
        $response->statusMessage = "Registro recuperado com sucesso.";
        $response->feedbackStatus = "success";
        $response->feedbackTitle = "Sucesso";
        $response->feedbackMessage = "Login efetuado com sucesso.";
        $response->user = $user;
        $response->company = $company;
        $response->contract = $contract;

      }else{

        $response = new stdClass();
        $response->status = 2;
        $response->statusMessage = "Não foi possível recuperar o registro.";
        $response->feedbackStatus = "error";
        $response->feedbackTitle = "Erro";
        $response->feedbackMessage = "Verifique os dados informados. Não foi possível efetuar login.";
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
