<?php

namespace Cognixia\RegisterDisable\Plugins;

use Magento\Customer\Model\Registration;
use Magento\Framework\App\Config\ScopeConfigInterface;

class AccountDisable{
    protected $scopeConfigValue;
    const XML_ACCOUNT_REGISTRATION_URL = 'customer/create_account/disable_account_registration';

    public function __construct(
        ScopeConfigInterface $scopeConfigValue
    )
    {
        $this->scopeConfigValue = $scopeConfigValue;
    }


    public function afterIsAllowed( Registration $subject, $result)
    {
        if($this->scopeConfigValue->isSetFlag(
            self::XML_ACCOUNT_REGISTRATION_URL, 
            $scopeType = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, 
            $scopeCode = null)
        ){
            return false;
        }else{
            return true;
        }
 
    }
}

