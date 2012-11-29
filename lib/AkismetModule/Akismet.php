<?php
/**
 * akismet service class
 */
class AkismetModule_Akismet {
	/**
	 * akismet service object
	 *
	 * @var object $service
	 */
	protected $service = null;

	/**
	 * module config
	 *
	 * @var object $config
	 */
	protected $config = null;

	/**
	 * init akismet service
	 */
	public function __construct($config) {
		if(!($config instanceof Zend_Config_Ini))
			throw new AkismetModule_Akismet_Exception('Config is not instance of Zend_Config');

		// save config
		$this->config = $config->akismet;

		if(!($config->akismet->apikey != '' && $config->akismet->url != ''))
			throw new AkismetModule_Akismet_Exception('Apikey or Url not set in config');

		// init akismet service
		$this->service = new Zend_Service_Akismet($config->akismet->apikey, $config->akismet->url);

		if(!($this->service != null))
			throw new AkismetModule_Akismet_Exception('Could not initialize akismet service');
	}

	/**
	 * check if content is spam
	 *
	 * @param string $content
	 * @param string $ip
	 * @param string $userAgent
	 * @return bool
	 */
	public function isSpam($content, $ip = null, $userAgent = null) {
		if($ip == null)
			$ip = $_SERVER['REMOTE_ADDR'];

		if($userAgent == null)
			$userAgent = $_SERVER['HTTP_USER_AGENT'];

		return $this->service->isSpam(array(
			'user_ip' => $ip,
			'user_agent' => $userAgent,
			'comment_content' => $content
		));
	}
}
