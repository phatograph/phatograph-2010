<?php

class User extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->hasColumn('username', 'string', 255, array(
                'type' => 'string',
                'length' => '255'
            )
        );

        $this->hasColumn('password', 'string', 255, array(
                'type' => 'string',
                'length' => '255'
            )
        );
    }

    public function setUp()
    {
        $this->hasMany('Group as Groups', array(
                'refClass' => 'UserGroup',
                'local' => 'user_id',
                'foreign' => 'group_id'
            )
        );

        $this->hasOne('Email', array(
                'local' => 'id',
                'foreign' => 'user_id'
            )
        );

        $this->hasMany('Phonenumber as Phonenumbers', array(
                'local' => 'id',
                'foreign' => 'user_id'
            )
        );
    }
}