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
	    $this->controllers = array('intolerancias');
	    parent::__construct(); 

	    $this->displayName = $this->l('Intolerancias y elergias'); 
	    $this->description = $this->l('Modulo para agregar filtros de Intolerancias y alergias de alimentos'); 
	    $this->confirmUninstall = $this->l('¿Estás seguro de que quieres desinstalar el módulo?'); 

	    $this->templateFile = 'module:intolerancias/views/templates/hook/intolerancias.tpl';
	}

	public function install(){
	    
	    include(dirname(__FILE__).'init/install.php');
	    return (parent::install()
	    && $this->registerHook('displayHeader') // Registramos el hook dentro de las cabeceras.
	    && $this->registerHook('displayHome')
	    && $this->registerHook('header')
        && $this->registerHook('backOfficeHeader')
	    );

	    $this->emptyTemplatesCache();

	    return (bool) $return;
	}

	public function hookDisplayHeader($params){
	    $this->context->controller->addCSS('modules-intolerancias', 'modules/'.$this->name.'/views/css/style.css', ['media' => 'all', 'priority' => 150]);
	    $this->context->controller->addJS('modules-intolerancias', 'modules/'.$this->name.'/views/js/script.js',[ 'position' => 'bottom','priority' => 150]);
	}
	
	/**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
    public function hookBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name) {
            $this->context->controller->addJS($this->_path.'views/js/script.js');
            $this->context->controller->addCSS($this->_path.'views/css/views/css/style.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/script.js');
        $this->context->controller->addCSS($this->_path.'/views/css/style.css');
    }
	

	public function uninstall(){
	    
	    include(dirname(__FILE__).'/init/uninstall.php');
	  $this->_clearCache('*');

	  if(!parent::uninstall() || !$this->unregisterHook('displayHome'))
	     return false;

	  return true;
	}

	public function hookDisplayHome(){


		$sql_history_reason = 'SELECT * FROM '._DB_PREFIX_.'intolerance_allergy';
	      $reason_data= Db::getInstance()->ExecuteS($sql_history_reason);		
	      $this->smarty->assign('reason_data', $reason_data);

    	return $this->display(__FILE__, 'views/templates/hook/intolerancias.tpl');
	}


}
?>
