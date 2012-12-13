<?php

/**
 * module bootstrap
 */
class AkismetBootstrap extends Knowledgeroot_Module_Bootstrap_Abstract {
	/**
	 * init plugin for akismet
	 */
	protected function _initPlugin() {
		// get controller instance
		$controller = Zend_Controller_Front::getInstance();

		// register akismet plugin
		$controller->registerPlugin(new Akismet_Plugin());
	}
}
