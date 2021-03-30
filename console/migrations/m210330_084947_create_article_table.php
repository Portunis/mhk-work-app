<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m210330_084947_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'description'=>$this->text(),
            'url'=>$this->string(255),
            'user_id'=>$this->integer(),
            'status'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
