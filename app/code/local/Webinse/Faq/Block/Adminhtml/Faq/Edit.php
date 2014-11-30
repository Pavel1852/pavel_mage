<?php

/**
 * Faq edit block
 *
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_Block_Adminhtml_Faq_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    /**
     * @todo set block group
     */
    public function __construct()
    {

        $this->_blockGroup = 'faq';
        $this->_controller = 'adminhtml_faq';
        /**
         * @todo set controller, then update buttons save & delete
         */
        if (!Mage::registry('current_faq')->getId()) {
            /**
             * 
             * @todo remove button delete
             */
            $this->_removeButton('delete');
        }
        parent::__construct();
        $this->_updateButton('save', 'label', Mage::helper('faq/data')->__('Save Faq'));
        $this->_updateButton('delete', 'label', Mage::helper('faq/data')->__('Delete Faq'));
    }

    public function getHeaderText()
    {
        /**
         * @todo if register model is set, return 'Edit Faq', esle return 'Add new Faq' by using helper
         */
        $faq = Mage::registry('current_faq');
        if ($faq->getId()) {
            return Mage::helper('faq/data')->__("Edit Faq '%s'", $this->escapeHtml($faq->getQuestion()));
        } else {
            return Mage::helper('faq/data')->__("Add new Faq");
        }
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }

}
