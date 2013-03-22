<?php

class Email extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->hasColumn('user_id', 'integer', 4, array(
                'type' => 'integer'
            )
        );

        $this->hasColumn('address', 'string', 255, array(
                'type' => 'string',
                'length' => '255'
            )
        );
    }

    public function setUp()
    {
        $this->hasOne('User', array(
                'local' => 'user_id',
                'foreign' => 'id'
            )
        );
    }
}