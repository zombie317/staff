<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%position}}`.
 */
class m210513_173422_create_position_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%position}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'salary' => $this->double(2),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%position}}');
    }
}
