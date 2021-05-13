<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%passport}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employee}}`
 */
class m210513_173341_create_passport_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%passport}}', [
            'id' => $this->primaryKey(),
            'id_employee' => $this->integer()->notNull(),
            'series' => $this->integer(4)->notNull(),
            'number' => $this->integer(6)->notNull(),
            'name' => $this->string()->notNull(),
            'date' => $this->date()->notNull(),
        ]);

        // creates index for column `id_employee`
        $this->createIndex(
            '{{%idx-passport-id_employee}}',
            '{{%passport}}',
            'id_employee'
        );

        // add foreign key for table `{{%employee}}`
        $this->addForeignKey(
            '{{%fk-passport-id_employee}}',
            '{{%passport}}',
            'id_employee',
            '{{%employee}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%employee}}`
        $this->dropForeignKey(
            '{{%fk-passport-id_employee}}',
            '{{%passport}}'
        );

        // drops index for column `id_employee`
        $this->dropIndex(
            '{{%idx-passport-id_employee}}',
            '{{%passport}}'
        );

        $this->dropTable('{{%passport}}');
    }
}
