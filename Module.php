<?php

/**
 * akismet module initialisation
 */
class AkismetModule implements Knowledgeroot_Module_Interface {
	/**
	 * return akismet config path
	 */
	public function getConfigPath() {
		return __DIR__ . '/config/module.ini';
	}
}
