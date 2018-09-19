<?php

function managerForgotPassword() {

  $request = \Slim\Slim::getInstance()->request();
  $json = json_decode($request->getBody());

  $sqlUserSelect = "SELECT U.EMAIL as userEmail, U.ID AS userId
                    FROM USER AS U
                    JOIN COMPANY CO ON CO.ID = U.COMPANY_ID
                    WHERE U.EMAIL = :userEmail
                    AND CO.CNPJ = :companyCnpj";

  try{
      $conn = getConn();

      //SQL AND BIND
      $stmt = $conn->prepare($sqlUserSelect);
      $stmt->bindParam("userEmail",$json->userEmail);
      $stmt->bindParam("companyCnpj",$json->companyCnpj);
      $stmt->execute();
      $userInfo = $stmt->fetch(PDO::FETCH_OBJ);
      $count = $stmt->rowCount(); //número de linhas afetadas

      if ($count > 0) {

        $userRequest = MD5(MD5(MD5(MD5(MD5(MD5(MD5($userInfo->userId)))))));

        $to = $json->userEmail;
        $subject = "[ Meu Sol - Fazenda Solar ] - Recuperação de senha";
        $message = "Você requisitou a recuperação de senha. Por favor, acesse o link para definir sua nova senha.<p><a href='http://meusol.net/manager/forgot-password?r=$userRequest'>http://meusol.net/manager/forgot-password?r=$userRequest</a></p>";
        $headers = "From: contato@meusol.net\r\n";
        $headers .= "Reply-To: contato@meusol.net\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        mail($to, $subject, $message, $headers);

        //RESPONSE
        $response = new stdClass();
        $response->status = 1;
        $response->statusMessage = "Registro recuperado com sucesso.";

        $response->feedbackStatus = "success";
        $response->feedbackTitle = "Sucesso";
        $response->feedbackMessage = "E-mail de redefinição de senha enviado com sucesso.";

      }else{
        //RESPONSE
        $response = new stdClass();
        $response->status = 2;
        $response->statusMessage = "Não foi possível recuperar o registro.";

        $response->feedbackStatus = "error";
        $response->feedbackTitle = "Sucesso";
        $response->feedbackMessage = "O e-mail informado não está cadastrado para este CNPJ.";
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
