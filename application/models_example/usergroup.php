<?php

class UserGroup extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->hasColumn('user_id', 'integer', 4, array(
                'type' => 'integer',
                'primary' => true
            )
        );

        $this->hasColumn('group_id', 'integer', 4, array(
                'type' => 'integer',
                'primary' => true
            )
        );
    }
}