<?php

class Archive extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('archive');
        $this->hasColumn('title', 'string', 255);
        $this->hasColumn('content', 'clob');
    }

    public function setUp() {
        $this->hasMany('ACategory as ACategories', array(
                'local' => 'archive_id',
                'foreign' => 'acat_id',
                'refClass' => 'Archive_ACategory'
                )
        );
        $this->hasMany('AComment as AComments', array(
                'local' => 'id',
                'foreign' => 'archive_id'
                )
        );

        $this->actAs('Timestampable');

        $this->actAs('Sluggable', array(
                'unique'    => true,
                'fields'    => array('title'),
                'canUpdate' => true
                )
        );

    }

}