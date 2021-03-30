<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recall}}`.
 */
class m210330_162718_create_recall_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recall}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(),
            'description' => $this->text(),
        ]);

        $this->createIndex(
            'idx-post-user_id',
            'recall',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-post-user_id',
            'recall',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }
    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-post-user_id',
            'recall'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-post-user_id',
            'recall'
        );

        // drops foreign key for table `category`


        $this->dropTable('recall');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%recall}}');
    }
}
