<?php
namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->get('/c', 'ClientesController::index');
$routes->get('cadonline', 'Home::index');  //cadastro online de clientes

// --------- S E C U R I T Y 
// -- https://www.positronx.io/codeigniter-authentication-login-and-registration-tutorial/
//$routes->get('/', 'SignupController::index');
$routes->get('/', 'SigninController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);
// --------- C O N T R O L L E R   C O N T A T O S
$routes->get('contatos', 'ContatosController::index'); // list
$routes->get('contatosj', 'ContatosController::contatosj'); // list json
$routes->get('contatosf/(:num)', 'ClientesController::porfamilia/$1'); // contato unico
$routes->get('contatosc', 'ContatosController::create'); // add page contato
$routes->post('contatoss', 'ContatosController::store'); // store
$routes->get('contatose/(:num)', 'ContatosController::singleUser/$1'); // edit page
$routes->post('contatosu', 'ContatosController::update'); // update
$routes->get('contatosd/(:num)', 'ContatosController::delete/$1'); // delete

$routes->get('contatosl', 'ContatosController::lab'); // lab test

// --------- C O N T R O L L E R   C L I E N T E S
$routes->get('clientes', 'ClientesController::index'); // list clientes
$routes->get('clientesj', 'ClientesController::clientesj'); // list clientes json
$routes->get('clientesa/(:num)', 'ClientesController::create/$1'); // unique clientes
$routes->post('clientess', 'ClientesController::store'); // store cliente
$routes->get('clientese/(:num)', 'ClientesController::edit/$1'); // edit page
$routes->post('clientesu', 'ClientesController::update'); // update
$routes->get('clientesd/(:num)', 'ClientesController::delete/$1'); // delete cliente

$routes->get('familiar/(:num)', 'ClientesController::familiar/$1'); // filtra familiares
$routes->get('clientesf/(:num)', 'ClientesController::porfamilia/$1'); // filtra familiares
$routes->get('clientes1', 'ClientesController::index1'); // datatable
$routes->get('clientes2', 'ClientesController::index2'); // vuetify

// --------- C O N T R O L L E R   R E C I B O S
$routes->get('recibos', 'RecibosController::index'); // list recibos
$routes->get('recibosj', 'RecibosController::recibosj'); // list recibos json
$routes->get('recibo/(:num)', 'RecibosController::recibo/$1'); // unique page recibo
$routes->get('reciboadd', 'RecibosController::reciboadd'); // add page recibo
$routes->post('recibostore', 'RecibosController::recibostore'); // store recibo
$routes->get('reciboe/(:num)', 'RecibosController::reciboe/$1'); //edit page recibo
$routes->post('recibou', 'RecibosController::recibou'); // update recibo
$routes->get('recibod/(:num)', 'RecibosController::recibod/$1'); // delete recibo
// - RECIBOSUB
$routes->get('recibosub/(:num)/(:num)', 'RecibosController::recibosub/$1/$2'); // add page recibosub
$routes->post('recibosubstore', 'RecibosController::recibosubstore'); // store recibosub
$routes->get('recibosube/(:num)', 'RecibosController::recibosube/$1'); //edit page recibosub
$routes->post('recibosubu', 'RecibosController::recibosubu'); // update recibosub
$routes->get('recibosubdel/(:num)/(:num)', 'RecibosController::recibosubdel/$1/$2'); // delete recibosub
// - RECIBOSUB por familia - link na pag clientes
$routes->get('recibosubf/(:num)', 'RecibosController::porfamilia/$1'); // filtra recibosub por familiar
$routes->get('recibosubfj/(:num)', 'RecibosController::familiar/$1'); // json recibosub por familiar
// - RECIBOPGT
$routes->get('recibopgta/(:num)', 'RecibosController::recibopgta/$1'); // add page recibopgt
$routes->post('recibopgts', 'RecibosController::recibopgts'); // store recibopgt
$routes->get('recibopgte/(:num)', 'RecibosController::recibopgte/$1'); //edit page recibopgt
$routes->post('recibopgtu', 'RecibosController::recibopgtu'); // update recibopgt
$routes->get('recibopgtdel/(:num)/(:num)', 'RecibosController::recibopgtdel/$1/$2'); // delete recibopgt
$routes->get('parcelar/(:num)/(:num)', 'RecibosController::parcelar/$1/$2'); // parcelas automáticas
// - PROCESSOS
$routes->get('/processos', 'RecibosController::processos');
$routes->get('/processosj', 'RecibosController::processosj');
// - TRAMITANDO
$routes->get('/tramitando', 'RecibosController::tramitando');
$routes->get('/tramitandoj', 'RecibosController::tramitandoj');  // tramitando json
$routes->post('/tramitandou', 'RecibosController::tramitandou'); // update tramitando
$routes->get('tramitandoet/(:num)', 'RecibosController::tramitandoet/$1'); //edit page tramitando

$routes->get('/tramitando1', 'RecibosController::tramitando1'); // em teste
$routes->get('/tramitando2', 'RecibosController::tramitando2'); // em teste
$routes->get('/tramitando3', 'RecibosController::tramitando3'); // em teste
$routes->get('/tramitando4', 'RecibosController::tramitando4'); // em teste
$routes->get('/tramitando5', 'RecibosController::tramitando5'); // report IRNs
$routes->get('/tramitando8', 'RecibosController::tramitando8'); // report por serviço
// - REPORTS
$routes->get('recibos1', 'RecibosController::index1');
$routes->get('recibos2', 'RecibosController::index2');
$routes->add('recibos3', 'RecibosController::index3');
$routes->add('jsonapi', 'RecibosController::jsonapi');
$routes->get('total', 'RecibosController::total');

// --------- C O N T R O L L E R   S E R V I Ç O S
$routes->get('servicos', 'ServicosController::index'); // list clientes
$routes->get('servicosj', 'ServicosController::servicosj'); // list clientes json
$routes->get('cservicosa/(:num)', 'ServicosController::create/$1'); // unique 
$routes->post('servicoss', 'ServicosController::store'); // store 
$routes->get('servicose/(:num)', 'ServicosController::edit/$1'); // edit page
$routes->post('servicosu', 'ServicosController::update'); // update
$routes->get('servicosd/(:num)', 'ServicosController::delete/$1'); // delete cliente

// --------- C O N T R O L L E R   F I N A N C E I R O
$routes->get('financeiro', 'FinanceiroController::index');                 //financeiro list
$routes->get('financeiroj', 'FinanceiroController::financeiroj');          //financeiro list json
$routes->get('financeiroc', 'FinanceiroController::create');               //create
$routes->post('financeiros', 'FinanceiroController::store');               //submit store
$routes->get('financeiroe/(:num)', 'FinanceiroController::singleUser/$1'); //edit
$routes->post('financeirou', 'FinanceiroController::update');              //update
$routes->get('financeirod/(:num)', 'FinanceiroController::delete/$1');     //delete
$routes->get('financeiroar', 'FinanceiroController::areceber');
$routes->get('financeiroar2', 'FinanceiroController::areceber2');
$routes->get('financeiroarj', 'FinanceiroController::areceberj');
$routes->get('financeiroarj2', 'FinanceiroController::areceberj2');

// --------- C O N T R O L L E R   L A B 
$routes->get('lab', 'Lab::index');
$routes->get('contatosx', 'Lab::contatos');
$routes->add('labs', 'Lab::cadastro');
$routes->add('labsc', 'Lab::clientes');
$routes->add('vuetify', 'Lab::vuetify');
$routes->add('clijson', 'Lab::clijson');
$routes->add('fatura', 'Lab::fatura');
$routes->get('tramitando2', 'Lab::tramitando2');
$routes->get('recibovue/(:num)', 'Lab::phpvue/$1');
$routes->get('reciboajax/(:num)', 'Lab::reciboajax/$1');
$routes->get('recibolab/(:num)', 'Lab::recibo/$1');
$routes->get('recibolabb/(:num)', 'Lab::recibob/$1');
$routes->add('pastas', 'Lab::pastas');
$routes->get('boottable', 'Lab::xboottable');
$routes->get('boottablej', 'Lab::xboottablej');
$routes->get('boottable2', 'Lab::xboottable2');
$routes->get('contrato', 'MpdfController::contrato');
$routes->get('contrato2', 'MpdfController::contrato2');
$routes->get('contrato3', 'MpdfController::contrato3');
$routes->get('gerarpdf', 'MpdfController::gerarpdf');
$routes->get('jspdf', 'MpdfController::jspdf');
$routes->get('fpublic', 'MpdfController::fpublic');
$routes->get('a4', 'MpdfController::geraa4');
$routes->get('boottablef/(:num)', 'Lab::porfamilia/$1'); // filtra familiares
// --------- C O N T R A T O S
$routes->get('autcontrato', 'ReportController::autcontrato');
$routes->get('autcontrato/(:num)', 'ReportController::autcontrato/$1');
// --------- F I L E S 
$routes->get('files/', 'FilesController::index');            // funciona
$routes->get('file/(:num)', 'FilesController::index2/$1'); // funciona
$routes->get('files3/', 'FilesController::index3');
$routes->get('filee/(:segment)', 'FilesController::filee/$1');
$routes->get('files/open/(:segment)', 'FilesController::open/$1');
//----------
$routes->get('myfile/', 'Files2Controller::filelist');  

// --------- C O N T R O L L E R   A P I
$routes->get('contatosapi', 'Api::index');
$routes->get('contatosapix/(:num)', 'Api::show/$1');
$routes->get('contatosapi2', 'ControllerApi::index');
$routes->get('contatosapix2/(:num)', 'ControllerApi::show/$1');
$routes->get('clientesapix2/(:num)', 'ControllerApi::showcli/$1');

// --------- C R U D    R E S T f u l  https://www.positronx.io/codeigniter-crud-with-bootstrap-and-mysql-example/
$routes->get('users-list', 'CrudController::index');
$routes->get('user-form', 'CrudController::create');
$routes->post('submit-form', 'CrudController::store');
$routes->get('edit-view/(:num)', 'CrudController::singleUser/$1');
$routes->post('update', 'CrudController::update');
$routes->get('delete/(:num)', 'CrudController::delete/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

// alterado no M1 às 23hs
