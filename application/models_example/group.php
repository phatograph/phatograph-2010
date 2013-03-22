<?php

class Group extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('groups');
        $this->hasColumn('name', 'string', 255, array(
                'type' => 'string',
                'length' => '255'
            )
        );
    }

    public function setUp()
    {
        $this->hasMany('User as Users', array(
                'refClass' => 'UserGroup',
                'local' => 'group_id',
                'foreign' => 'user_id'
            )
        );
    }
}