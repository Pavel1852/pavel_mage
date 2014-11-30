<?php

/** @var Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

/**
 * @todo add table webinse_faq2 (don't use method run(), it's deprecated method)
 *
 * entity_id    - int, not null, auto increment, primery key
 * question     - varchar
 * answer       - varchar
 * user_id      - int (current admin ID), set foreign key for this field (relaited with table - 'admin_user', field - 'user_id')
 */

$table = $installer->getConnection()
    ->newTable($installer->getTable('webinse_faq2'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, notnull, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Id')
    ->addColumn('question', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'  => false,
    ), 'Question')
    ->addColumn('answer', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'  => false,
    ), 'Answer')
    ->addColumn('user_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable'  => false,
        'unsigned'  => true
    ), 'admin ID')
    ->addForeignKey(
        $installer->getFkName(
            'webinse_faq2',
            'website_id',
            'admin_user',
            'website_id'
        ),
        'user_id', $installer->getTable('admin_user'),
        'user_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->setComment('Webinse Faq2 Table');

$installer->getConnection()->createTable($table);
$installer->endSetup();