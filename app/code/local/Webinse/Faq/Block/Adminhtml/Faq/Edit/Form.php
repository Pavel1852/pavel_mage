<?php

/**
 * Adminhtml product discount edit form
 *
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_Block_Adminhtml_Faq_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Prepare form for render
     */
    protected function _prepareForm()
    {
        parent::_prepareForm();
        $form = new Varien_Data_Form();
        $faq  = Mage::registry('current_faq');

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend' => Mage::helper('faq/data')->__('FAQ Information')));

        if ($faq->getId()) {
            /**
             * @todo add field with faq id
             */
            $fieldset->addField('entity_id', 'hidden', array(
                'name'      => 'id',
                'required'  => true
            ));
        }

        /**
         * @todo add other fields, use class for validation (js/prototype/validation.js)
         */
        $fieldset->addField('question', 'text', array(
            'name'      => 'question',
            'title'     => Mage::helper('faq/data')->__('Question'),
            'label'     => Mage::helper('faq/data')->__('Question'),
            'maxlength' => '250',
            'required'  => true,
        ));

        $fieldset->addField('answer', 'textarea', array(
            'name'      => 'answer',
            'title'     => Mage::helper('faq/data')->__('Answer'),
            'label'     => Mage::helper('faq/data')->__('Answer'),
            'style'     => 'width: 98%; height: 200px;',
            'required'  => true,
        ));

        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));
        $form->addValues($faq->getData());

        /**
         * set action to form and other params to form
         */
        $this->setForm($form);

    }

}
