<?php

/**
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_Model_Resource_Faq extends Mage_Core_Model_Resource_Db_Abstract
{

    /**
     * Set main entity table name and primary key field name
     */
    protected function _construct()
    {
        //you must init model defined in the config.xml
        $this->_init('faq/faq', 'entity_id');
    }

}