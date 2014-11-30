<?php

/**
 * Adminhtml faq grid block
 *
 * @category    Webinse
 * @package     Webinse_Faq
 * @author      Alena Tsareva <alena.tsareva@webinse.com>
 */
class Webinse_Faq_Block_Adminhtml_Faq_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();

        /**
         * @todo set grid id, sort and save to session parameters
         */
        $this->setId('faqGrid');
        $this->_controller = 'adminhtml_faq';
        $this->setUseAjax(true);
        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);

        parent::__construct();
    }

    protected function _prepareCollection()
    {
        /**
         * @todo init faq collection
         */
        $collection = Mage::getResourceModel('faq/faq_collection');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Configuration of grid
     */
    protected function _prepareColumns()
    {
        /**
         * @todo prepare columns for grid
         */
        $helper = Mage::helper('faq/data');
        $this->addColumn('entity_id', array(
            'header'        => $helper->__('ID'),
            'align'         => 'right',
            'width'         => '20px',
            'filter_index'  => 'entity_id',
            'index'         => 'entity_id'
        ));

        $this->addColumn('question', array(
            'header'        => $helper->__('Question'),
            'align'         => 'left',
            'filter_index'  => 'question',
            'index'         => 'question',
            'type'          => 'varchar',
            'truncate'      => 50,
            'escape'        => true,
        ));

        $this->addColumn('answer', array(
            'header'        => $helper->__('Answer'),
            'align'         => 'left',
            'filter_index'  => 'answer',
            'index'         => 'answer',
            'type'          => 'varchar',
            'truncate'      => 50,
            'escape'        => true,
        ));

        $this->addColumn('user_id', array(
            'header'        => $helper->__('user_id'),
            'align'         => 'right',
            'width'         => '20px',
            'filter_index'  => 'user_id',
            'index'         => 'user_id'
        ));

        $this->addColumn('action', array(
            'header'    => $helper->__('Action'),
            'width'     => '50px',
            'type'      => 'action',
            'getter'     => 'getId',
            'actions'   => array(
                array(
                    'caption' => $helper->__('Edit'),
                    'url'     => array(
                        'base'=>'*/*/edit',
                    ),
                    'field'   => 'id'
                )
            ),
            'filter'    => false,
            'sortable'  => false,
            'index'     => 'id',
        ));
        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        /**
         * @todo return url to edit page
         */
        return $this->getUrl('*/*/edit', array(
            'id' => $row->getId(),
        ));
    }

}
