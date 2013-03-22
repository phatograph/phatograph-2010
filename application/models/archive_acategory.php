<?php

class Archive_ACategory extends Doctrine_Record {
    public function setTableDefinition() {
        $this->setTableName('archive_acategory');

        $this->hasColumn('acat_id', 'integer', array(
                'primary' => true,
                'default' => 1
                )
        );

        $this->hasColumn('archive_id', 'integer', array(
                'primary' => true
                )
        );
    }
}