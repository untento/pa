<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_tag`.
 */
class m171226_123238_create_article_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article_tag', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article_tag');
    }
}
