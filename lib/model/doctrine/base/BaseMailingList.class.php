<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('MailingList', 'doctrine');

/**
 * BaseMailingList
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $email
 * 
 * @method integer     getId()    Returns the current record's "id" value
 * @method string      getEmail() Returns the current record's "email" value
 * @method MailingList setId()    Sets the current record's "id" value
 * @method MailingList setEmail() Sets the current record's "email" value
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMailingList extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mailing_list');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}