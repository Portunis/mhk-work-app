<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%requests}}`.
 */
class m210330_095743_create_requests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%requests}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'request_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%requests}}');
    }
}
