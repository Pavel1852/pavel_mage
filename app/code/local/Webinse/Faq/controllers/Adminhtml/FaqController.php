<?php

/**
 * Faq controller
 *
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_Adminhtml_FaqController extends Mage_Adminhtml_Controller_Action
{

    /**
     * Init actions
     *
     * @return Webinse_Faq_Model_Faq
     */
    protected function _initFaq()
    {
        $helper = Mage::helper('faq/data');
        $this->_title($helper->__('Webinse'))->_title($helper->__('FAQ'));

        /**
         * you can see about register method there http://alanstorm.com/magento_registry_singleton_tutorial
         */
        Mage::register('current_faq', Mage::getModel('faq/faq'));
        $faqId = $this->getRequest()->getParam('id');
        if (!is_null($faqId)) {
            Mage::registry('current_faq')->load($faqId);
        }
    }

    /**
     * Faq grid
     */
    public function indexAction()
    {
        $this->loadLayout();
        $helper = Mage::helper('faq/data');
        $this->_title($helper->__('Webinse'))->_title($helper->__('FAQ'));
        /**
         * @todo set active menu
         */

        $this->_setActiveMenu('webinse/faq');
        $this->renderLayout();
    }

    /**
     * Edit or create faq
     */
    public function newAction()
    {
        $this->_initFaq();
        $this->loadLayout();
        /**
         * @todo set active menu and add
         */
        $this->_setActiveMenu('webinse/new');
        /**
         * @todo append faq block (faq/adminhtml_faq_edit) to content
         *      (you may find in magento how do it, for example go to Mage -> Adminhtml -> controllers and open CustomerController)
         */
        $this->_addContent($this->getLayout()->createBlock(
            'faq/adminhtml_faq_edit'));
        $this->renderLayout();
    }

    /**
     * Edit faq action. Forward to new action.
     */
    public function editAction()
    {
        $this->_forward('new');
    }

    /**
     * Create or save faq.
     */
    public function saveAction()
    {
        /**
         * @todo save to db all params from post
         *      to 'user_id' field set id of the current administrator
         */
        if ($data = $this->getRequest()->getPost()) {

            //init model and set data
            $model = Mage::getModel('faq/faq');

            if ($id = $this->getRequest()->getParam('entity_id')) {
                $model->load($id);
            }

            $model->setData($data);
            $model->setUser_id(Mage::getSingleton('admin/session')->getUser()->getUserId());
            // try to save it
            try {
                // save the data
                $model->save();

                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('faq/data')->__('The faq successfully saved.'));
                // clear previously saved data from session
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                // go to grid
                $this->_redirect('*/*/');
                return;

            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
            catch (Exception $e) {
                $this->_getSession()->addException($e,
                    Mage::helper('faq/data')->__('Somethings went wrong.'));
            }

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array('entity_id' => $this->getRequest()->getParam('entity_id')));
            return;
        }

        return $this->_redirect('*/*/');
    }

    /**
     * Delete faq action
     */
    public function deleteAction()
    {
        /**
         * @todo delete faq by id, use try..catch blocks,
         *          set message about delete process to session and then set redirect to index action
         */
        $faqId = $this->getRequest()->getParam('id', false);

        try {
            Mage::getModel('faq/faq')->setId($faqId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('faq/data')->__('Faq successfully deleted'));

            return $this->_redirect('*/*/');
        } catch (Mage_Core_Exception $e){
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
        }

        $this->_redirectReferer();
    }

}
