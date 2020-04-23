# Sistema de Receita e Despesas

Estrutura em MVC - CMS com Bootstrap

## No seu git local favor utilizar o comando de não acompanhamento para os seguintes arquivos:

- .htaccess
- config.php
- environment.php

```
$ git update-index --assume-unchanged file-name
```
## 1 - Alteração do ambiente de trabalho
Arquivo: environment.php - Para trocar o ambiente é deixar sem comentário.
```
<?php
define("ENVIRONMENT", "development");
//define("ENVIRONMENT", "preview");
//define("ENVIRONMENT", "production");
```
## 2 - Alterando .htaccss
Arquivo .htaccess - Verficar e descomentar a url padrão do local.
```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /agenciaOrbita/simpalaseguros.com.br/index.php?q=$1 [QSA,L]
#RewriteRule ^(.*)$ /projeto/index.php?q=$1 [QSA,L]
#RewriteRule ^(.*)$ /index.php?q=$1 [QSA,L]

```
## 3 - Configuração do config

```
$config = array();
if(ENVIRONMENT == 'development') {

	define("BASE_URL", "http://localhost/agenciaOrbita/simpalaseguros.com.br/");
	$config['dbname'] = 'simpalaseguros';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';

}elseif(ENVIRONMENT == 'preview'){

	define("BASE_URL", "//www.seusite.com.br/projeto/");
	$config['dbname'] = 'bd_name';
	$config['host'] = 'host';
	$config['dbuser'] = 'user_bd';
	$config['dbpass'] = '#pass_bd';

} elseif(ENVIRONMENT == 'production') {

	define("BASE_URL", "//www.seusite.com.br/");
	$config['dbname'] = 'bd_name';
	$config['host'] = 'host';
	$config['dbuser'] = 'user_bd';
	$config['dbpass'] = '#pass_bd';
}
```