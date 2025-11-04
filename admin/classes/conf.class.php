<?php 
class Conf
{
	public $_ProductName;
	public $_ProductLogo;
	public $_ProductIcon;
	public $_MailName;
	public $_WebsiteLink;
	public $_MailSignature;
	public $_DomainName;
	public $_LeadName;
	public $_Telecaller_LeadName;
	public $_MailLogo;
	public function __construct()
	{
		$jsonString = file_get_contents('../config/config.json');
		$configData = json_decode($jsonString, true);
		$this->_ProductName = $configData['product']['_ProductName'];
		$this->_ProductLogo = $configData['product']['_ProductLogo'];
		$this->_ProductIcon = $configData['product']['_ProductIcon'];
		$this->_MailName = $configData['product']['_MailName'];
		$this->_WebsiteLink = $configData['product']['_WebsiteLink'];
		$this->_MailSignature = $configData['product']['_MailSignature'];
		$this->_DomainName = $configData['product']['_DomainName'];
		$this->_LeadName = $configData['product']['_LeadName'];
		$this->_Telecaller_LeadName = $configData['product']['_Telecaller_LeadName'];
		$this->_MailLogo = $configData['product']['_MailLogo'];
	}
}