<?php
class controller {

	protected $db;
	protected $lang;

	public function __construct() {
		global $config;
		$this->lang = new Language;
	}
	
	public function loadView($viewName, $viewData = []) {
		extract($viewData);
		include 'views/'.$viewName.'.php';
	}

	public function loadTemplate($viewName, $viewData = []) {
		include 'views/site/template.php';
	}

	public function loadTemplateInPainel($viewName, $viewData = []) {
		include 'views/painel/template.php';
	}

	public function loadViewInTemplate($viewName, $viewData = [])  {
		extract($viewData);
		include 'views/site/'.$viewName.'.php';
	}

	public function loadViewInPainel($viewName, $viewData = []) {
		extract($viewData);
		include 'views/painel/'.$viewName.'.php';
	}

}