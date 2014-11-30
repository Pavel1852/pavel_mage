<?php

/**
 * Adminhtml faq page content block
 *
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_Block_Adminhtml_Faq extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    /**
     * this is handle to block that set in config
     */
    protected $_blockGroup = 'faq';

    public function __construct()
    {
        /**
         * this is path to grid block
         */
        $this->_controller = 'adminhtml_faq';
        /**
         * @todo modify header & button labels by using using helper
         */
        $this->_headerText     = Mage::helper('faq/data')->__('Manage FAQ');
        $this->_addButtonLabel = Mage::helper('faq/data')->__('Add New FAQ');

        parent::__construct();
    }

    /**
     * Redefine header css class
     *
     * @return string
     */
    public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }

}
