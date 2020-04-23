<?php
require 'environment.php';
date_default_timezone_set('America/Sao_Paulo');
global $config;
global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	
	define("BASE", "http://localhost/aleEvolucoes/receita_despesa/");
	$config['dbname'] = 'receita_despesa';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';

}elseif(ENVIRONMENT == 'preview'){

	define("BASE", "//www.seusite.com.br/projeto/");
	$config['dbname'] = 'bd_name';
	$config['host'] = 'host';
	$config['dbuser'] = 'user_bd';
	$config['dbpass'] = '#pass_bd';

} elseif(ENVIRONMENT == 'production') {

	define("BASE", "//www.seusite.com.br/");
	$config['dbname'] = 'bd_name';
	$config['host'] = 'host';
	$config['dbuser'] = 'user_bd';
	$config['dbpass'] = '#pass_bd';
}

//Define o Desenvolvedor do Projeto
define("AUTOR", "Agência Órbita, Ale Evoluções");

//Define o idoma Padrão caso tenha Multilinguagem
$config['defaut_lang'] = 'pt-br';

//Define a url Padrão de Imagems:
define("BASE_IMAGES", BASE.'assets/images/');
//Define a url Padraão de Arquivos:
define("BASE_MEDIA", BASE.'media/');
//Define a url Padrão de CSS
define("BASE_CSS", BASE.'assets/css/');
//Define a url Padrão de Script
define("BASE_SCRIPT", BASE.'assets/js/');


$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);