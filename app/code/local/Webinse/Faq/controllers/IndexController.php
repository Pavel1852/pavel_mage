<?php

/**
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_IndexController extends Mage_Core_Controller_Front_Action{
    /**
     * For example you may visit the following URL http://example.com/frontName/index/getAllFaq
     */
    public function getAllFaqAction(){
        /**
         * @todo Load your collection
         */
        $collection = array();
        foreach($collection as $item){
            echo '<h2>' . $item->getQuestion() . '</h2>';
            echo '<p>' . $item->getAnswer() . '</p>';
            echo '<p>' . $item->getDate() . '</p>';
        }
    }

    /**
     * For example you may visit the following URL http://example.com/frontName/index/addNewFaq?question=question1&answer=answer1
     */
    public function addNewFaqAction(){
        /**
         * @todo here you must get all params sent by url
         */
        $params = array();
        $faqObject = Mage::getModel('your_model_class/faq');

        /**
         * @todo set params to faq object
         */
        $faqObject->save();

        echo 'New record with ID = ' . $faqObject->getId() . 'successfully added.';
    }

    /**
     * For example you may visit the following URL http://example.com/frontName/index/editFaqById/id/1
     */
    public function editFaqByIdAction(){
        /**
         * @todo here you must get id sent by url and load record by id
         */
        $faqObject = Mage::getModel('your_model_class/faq');

        /**
         * @todo change some field ('question' or 'answer') in object
         */
        $faqObject->save();
        echo 'Record with ID = ' . $faqObject->getId() . 'have been changed.';
    }

    /**
     * For example you may visit the following URL http://example.com/frontName/index/deleteFaqById/id/1
     */
    public function deleteFaqByIdAction(){
        /**
         * @todo here you must get id sent by url
         */
        $id = '';

        /**
         * @todo Load model by id
         */
        $faqObject = Mage::getModel('your_model_class/faq');

        /**
         * @todo Delete record
         */
        echo 'Record with ID = ' . $id . 'have been deleted.';
    }

}
