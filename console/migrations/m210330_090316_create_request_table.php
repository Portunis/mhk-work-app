<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 */
class m210330_090316_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'description'=>$this->text(),
            'date'=>$this->date(),
            'user_id'=>$this->integer(),
            'employee_id'=>$this->integer(),
            'status'=>$this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%request}}');
    }
}
