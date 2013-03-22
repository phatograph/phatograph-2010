<?php

class ACategory extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('acategory');
        $this->hasColumn('name', 'string', 255);
    }

    public function setUp()
    {
        $this->hasMany('Archive as Archives', array(
                'local' => 'acat_id',
                'foreign' => 'archive_id',
                'refClass' => 'Archive_ACategory'
            )
        );
    }
}