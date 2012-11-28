<?php
/**
 *
 */
class AkismetModule_Akismet_Plugin extends Zend_Controller_Plugin_Abstract {
	/**
	 *
	 */
	public function preDispatch(Zend_Controller_Request_Abstract $request) {
		$module = $request->getModuleName();
		$controller = $request->getControllerName();
		$action = $request->getActionName();

		if($module == '' && $controller == '' && $action == '') {

		}
	}
}
