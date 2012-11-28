<?php

/**
 * module bootstrap
 */
class AkismetBootstrap {
	public function __construct() {
	    $this->_initPlugin();
	}

	/**
	 * init plugin for akismet
	 */
	protected function _initPlugin() {
		// get controller instance
		$controller = Zend_Controller_Front::getInstance();

		// register akismet plugin
		$controller->registerPlugin(new AkismetModule_Akismet_Plugin());
	}
}
