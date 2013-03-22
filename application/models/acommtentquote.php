<?php

class ACommentQuote extends Doctrine_Record {

    public function setTableDefinition() {
        $this->setTableName('acommentquote');
        $this->hasColumn('comment_id', 'integer');
        $this->hasColumn('content', 'clob');
    }

    public function setUp() {

        $this->hasOne('AComment', array(
                'local' => 'comment_id',
                'foreign' => 'id',
                )
        );

        $this->actAs('Timestampable');

    }

}