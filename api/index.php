<?php
/**
 * --------------------------------------------------------------------------------------------------
 *
 * Meu Sol - Fazenda Solar - WEBSERVICE API
 *
 * This file has the import and routes for the MEU SOL Webservice
 *
 * @category   Webservice
 * @package    api
 * @author     Thiago Pires <thiagopac@gmail.com>
 * @copyright  2018 Meu Sol - Fazenda Solar
 * @version    1.0
 *
 * --------------------------------------------------------------------------------------------------
 */

require 'Slim/Slim.php';

//-----ROUTE FILES

//Subclass
require './routes/listSubclasses.php';
require './routes/createSubclass.php';
require './routes/editSubclass.php';

//Tariff Modality
require './routes/listTariffModalities.php';
require './routes/createTariffModality.php';
require './routes/editTariffModality.php';

//Plan
require './routes/listPlans.php';
require './routes/createPlan.php';
require './routes/editPlan.php';

//Plan Detail
require './routes/listPlanDetails.php';
require './routes/createPlanDetail.php';
require './routes/editPlanDetail.php';

//Tariff
require './routes/listTariffs.php';
require './routes/createTariff.php';
require './routes/editTariff.php';

//Discount
require './routes/listDiscounts.php';
require './routes/createDiscount.php';
require './routes/editDiscount.php';

//Tariff Rule
require './routes/listTariffRules.php';
require './routes/createTariffRule.php';
require './routes/editTariffRule.php';

//Company
require './routes/listCompanies.php';
require './routes/createCompany.php';
require './routes/editCompany.php';

//Contract
require './routes/listContracts.php';
require './routes/createContract.php';
require './routes/editContract.php';
require './routes/retrieveContract.php';

//Contact
require './routes/listContacts.php';
require './routes/createContact.php';
require './routes/editContact.php';

//Simulation
require './routes/listSimulations.php';
require './routes/createSimulation.php';
require './routes/retrieveSimulation.php';
require './routes/markSimulationAsRead.php';

//booking
require './routes/createBooking.php';
require './routes/listBookings.php';

//User Login
require './routes/managerLogin.php';
require './routes/managerForgotPassword.php';
require './routes/managerCreateUser.php';
require './routes/managerChangePassword.php';

//General
require './routes/listSubclassTariffModalityPlan.php';
require './routes/retrieveMonthlyPayment.php';
require './routes/createReferralRegistry.php';
require './routes/retrieveReferralRegistries.php';

//Support
require './routes/listSupports.php';
// require './routes/createSupport.php';
require './routes/editSupport.php';

//Support Subjects
require './routes/listSupportSubjects.php';
require './routes/createSupportSubject.php';
require './routes/editSupportSubject.php';
require './routes/retrieveSupports.php';

//TIMEZONE
date_default_timezone_set("America/Sao_Paulo");

//CONSTRUCTOR - REGISTER
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

//CHARTSET
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

//NOT FOUND ROUTE
$app->notFound(function () use ($app) {
    notFound();
});

//ERROR FUNCTION
$app->error(function (\Exception $e) use ($app) {
		// notFound();
});

//APP ENVINRONMENT
$app->config('debug', false);

//GET ROUTES
$app->get('/', 'notFound');
$app->get('/subclasses','listSubclasses');
$app->get('/tariff-modalities','listTariffModalities');
$app->get('/plans','listPlans');
$app->get('/plan-details','listPlanDetails');
$app->get('/tariffs','listTariffs');
$app->get('/discounts','listDiscounts');
$app->get('/subclass-tariffmodality-plan','listSubclassTariffModalityPlan');
$app->get('/simulation/retrieve-simulation/:simulationId','retrieveSimulation');
$app->get('/contract/retrieve-contract/:companyId','retrieveContract');
$app->get('/financial/retrieve-monthly-payment/:companyId/:qtyResults','retrieveMonthlyPayment');
$app->get('/referral/retrieve-referral-registries/:companyId','retrieveReferralRegistries');
$app->get('/tariff-rules','listTariffRules');
$app->get('/companies','listCompanies');
$app->get('/contracts','listContracts');
$app->get('/contacts','listContacts');
$app->get('/simulations','listSimulations');
$app->get('/simulations','listSimulations');
$app->get('/bookings','listBookings');
$app->get('/supports','listSupports');
$app->get('/support-subjects','listSupportSubjects');
$app->get('/support/retrieve-supports/:companyId','retrieveSupports');

//POST ROUTES
$app->post('/simulation/create-simulation','createSimulation');
$app->post('/simulation/read-simulation','markSimulationAsRead');
$app->post('/booking/create-booking','createBooking');
$app->post('/manager/login','managerLogin');
$app->post('/manager/forgot-password','managerForgotPassword');
$app->post('/manager/change-password','managerChangePassword');
$app->post('/manager/create-user','managerCreateUser');
$app->post('/referral/create-registry','createReferralRegistry');
$app->post('/create-tariff','createTariff');
$app->post('/create-tariff-modality','createTariffModality');
$app->post('/create-subclass','createSubclass');
$app->post('/create-discount','createDiscount');
$app->post('/create-plan','createPlan');
$app->post('/create-tariff-rule','createTariffRule');
$app->post('/create-company','createCompany');
$app->post('/create-contract','createContract');
$app->post('/create-contact','createContact');
$app->post('/create-plan-detail','createPlanDetail');
// $app->post('/create-support','createSupport');
$app->post('/create-support-subject','createSupportSubject');

//PUT ROUTES
$app->put('/edit-tariff','editTariff');
$app->put('/edit-tariff-modality','editTariffModality');
$app->put('/edit-subclass','editSubclass');
$app->put('/edit-discount','editDiscount');
$app->put('/edit-plan','editPlan');
$app->put('/edit-tariff-rule','editTariffRule');
$app->put('/edit-company','editCompany');
$app->put('/edit-contract','editContract');
$app->put('/edit-contact','editContact');
$app->put('/edit-plan-detail','editPlanDetail');
$app->put('/edit-support','editSupport');
$app->put('/edit-support-subject','editSupportSubject');

//APP RUN
$app->run();

//NOT FOUND FUNCTION
function notFound(){
	header('HTTP/1.1 404 Not Found');
	die();
}

//CONNECTION FUNCTION
function getConn(){
  if($_SERVER['SERVER_NAME'] == "localhost"){
    return new PDO('mysql:host=localhost;dbname=meusol','root','mysql',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }else if ($_SERVER['SERVER_NAME'] == "www.meusol.net" || $_SERVER['SERVER_NAME'] == "meusol.net"){
    return new PDO('mysql:host=localhost;dbname=meuso903_prod','meuso903_user','M6Mvz6GW',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
}
