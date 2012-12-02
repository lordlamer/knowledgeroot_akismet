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

		// content.edit and method post
		if($module == '' && $controller == 'content' && ($action == 'edit' || $action == 'new') && $this->getRequest()->getMethod() == 'POST') {
		    // get module config
		    $config = Knowledgeroot_Registry::get('akismet_config');

		    // init akismet
		    $akismet = new AkismetModule_Akismet($config);

		    // check if content is spam
		    if($akismet->isSpam($request->getParam('content'))) {
			Knowledgeroot_Message::error('Spam detected', 'Your content was detected as spam!');

			// redirect
			if($action == 'edit') {
			    $this->_response->setRedirect('./'.$request->getParam('id'));
			} else {
			    $this->_response->setRedirect('.');
			}
		    }
		}
	}
}
