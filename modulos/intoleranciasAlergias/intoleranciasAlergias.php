<?php
if(!defined('_PS_VERSION_'))
exit;

class IntoleranciasAlergias extends Module{

	public function __construct(){
		$this->name = 'intoleriasAlergias'; 
		$this->tab = 'front_office_features';
		$this->version = '1.0.0'; 
		$this->author ='Lyzmar Padilla'; 
		$this->need_instance = 0; 
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_); 
		$this->bootstrap = true;

		parent::__construct();

		$this->displayName = $this->l('Intolerias y Alergias'); 
		$this->description = $this->l('Modulo para agregar filtros de Intolerancias y alergias de alimentos'); 
		$this->confirmUninstall = $this->l('¿Está seguro que desea desinstalar el modulo?'); 

		$this->templateFile = 'module:intoleranciasAlergias/views/templates/hook/intoleranciasAlergias.tpl';

	}

	public function install(){

		if (parent::install() == false)return false;

    /* CREANDO LAS TABLAS INICIALES */
    $sql = array();
    include (dirname(__file__) . '/init/install_sql.php');
    foreach ($sql as $s) {
        if (!Db::getInstance()->Execute($s)) {
            return false;
        }
    }
    return (parent::install() && $this->registerHook('displayHeader') && $this->registerHook('displayHome'));
    $this->emptyTemplatesCache();
    return (bool) $return;
	}

	public function uninstall(){
	  $this->_clearCache('*');

	  
    $sql = array();
    include (dirname(__file__) . '/init/uninstall_sql.php');
    foreach ($sql as $s) {
        if (!Db::getInstance()->Execute($s)) {
            return FALSE;
        }
    }

	  if(!parent::uninstall() || !$this->unregisterHook('displayHome'))
	     return false;

	  return true;
	}


	public function hookDisplayHeader($params){
    $this->context->controller->registerStylesheet('modules-intoleriasAlergias', 'modules/'.$this->name.'/views/css/intoleriasAlergias.css', ['media' => 'all', 'priority' => 150]);
    $this->context->controller->registerJavascript('modules-intoleriasAlergias', 'modules/'.$this->name.'/views/js/intoleriasAlergias.js',[ 'position' => 'bottom','priority' => 150]);
	}

	public function hookDisplayHome(){
		/*$this->context->smarty->assign('call_controller',  $this->context->link->getModuleLink($this->name, 'intoleriasAlergias', array(), true));*/
    return $this->display(__FILE__, 'views/templates/hook/intoleriasAlergias.tpl');
	}


}