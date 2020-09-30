<?php
if(!defined('_PS_VERSION_'))
exit;

class intolerancias extends Module{
	public function __construct(){
	    $this->name = 'intolerancias';
	    $this->tab = 'front_office_features';
	    $this->version = '1.0.0';
	    $this->author ='Lyzmar Padilla Sr. Web developer'; 
	    $this->need_instance = 0;
	    $this->ps_versions_compliancy = array('min' => '1.6.x.x', 'max' => _PS_VERSION_); 
	    $this->bootstrap = true; 
	    parent::__construct(); 

	    $this->displayName = $this->l('Intolerancias y elergias'); 
	    $this->description = $this->l('Modulo para agregar filtros de Intolerancias y alergias de alimentos'); 
	    $this->confirmUninstall = $this->l('¿Estás seguro de que quieres desinstalar el módulo?'); 

	    $this->templateFile = 'module:intolerancias/views/templates/hook/intolerancias.tpl';
	}

	public function install(){
	    return (parent::install()
	    && $this->registerHook('displayHeader') // Registramos el hook dentro de las cabeceras.
	    && $this->registerHook('displayHome')
	    );

	    $this->emptyTemplatesCache();

	    return (bool) $return;
	}

	public function hookDisplayHeader($params){
	    $this->context->controller->registerStylesheet('modules-intolerancias', 'modules/'.$this->name.'/views/css/style.css', ['media' => 'all', 'priority' => 150]);
	    $this->context->controller->registerJavascript('modules-intolerancias', 'modules/'.$this->name.'/views/js/script.js',[ 'position' => 'bottom','priority' => 150]);
	}

	public function uninstall(){
	  $this->_clearCache('*');

	  if(!parent::uninstall() || !$this->unregisterHook('displayHome'))
	     return false;

	  return true;
	}

	public function hookDisplayHome(){
    	return $this->display(__FILE__, 'views/templates/hook/intolerancias.tpl');
	}


}
?>