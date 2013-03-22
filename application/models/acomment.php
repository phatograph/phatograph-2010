<?php

class AComment extends Doctrine_Record {

    public function setTableDefinition() {
        $this->setTableName('acomment');
        $this->hasColumn('archive_id', 'integer');
        $this->hasColumn('content', 'clob');
    }

    public function setUp() {

        $this->hasOne('Archive', array(
                'local' => 'archive_id',
                'foreign' => 'id',
                )
        );

        $this->hasMany('ACommentQuote as ACommentQuotes', array(
                'local' => 'id',
                'foreign' => 'comment_id'
                )
        );

        $this->actAs('Timestampable');

    }

}