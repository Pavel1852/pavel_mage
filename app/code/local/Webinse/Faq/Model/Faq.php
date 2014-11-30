<?php

/**
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_Model_Faq extends Mage_Core_Model_Abstract
{

    public function _construct()
    {
        parent::_construct();

        //you must init model defined in the config.xml
        $this->_init('faq/faq');
    }

}