<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type_vacation}}`.
 */
class m210513_174146_create_type_vacation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type_vacation}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%type_vacation}}');
    }
}
