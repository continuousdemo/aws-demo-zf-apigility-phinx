<?php

use Phinx\Migration\AbstractMigration;

class Migration1 extends AbstractMigration
{
    public function up()
    {
        $articles = $this->table('articles', ['id' => false, 'primary_key' => array('id')]);
        $articles
            ->addColumn('id', 'integer')
            ->addColumn('name', 'string')
            ->save();
    }
    
    public function down()
    {
        $this->dropTable('articles');
    }
}
