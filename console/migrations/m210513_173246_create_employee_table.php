<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m210513_173246_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'number' => $this->string(10)->notNull(),
            'last_name' => $this->string()->notNull(),
            'first_name' => $this->string()->notNull(),
            'middle_name' => $this->string()->notNull(),
            'gender' => $this->boolean(),
            'address' => $this->string(),
            'phone' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }
}
