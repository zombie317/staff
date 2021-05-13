<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vacation}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employee}}`
 * - `{{%firm}}`
 * - `{{%type_vacation}}`
 */
class m210513_174154_create_vacation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vacation}}', [
            'id' => $this->primaryKey(),
            'number' => $this->string(10)->notNull(),
            'date' => $this->date()->notNull(),
            'id_employee' => $this->integer()->notNull(),
            'id_firm' => $this->integer()->notNull(),
            'id_type_vacation' => $this->integer()->notNull(),
            'date_start' => $this->date()->notNull(),
            'date_end' => $this->date()->notNull(),
            'quantity_days' => $this->integer()->notNull(),
            'article' => $this->string()->notNull(),
        ]);

        // creates index for column `id_employee`
        $this->createIndex(
            '{{%idx-vacation-id_employee}}',
            '{{%vacation}}',
            'id_employee'
        );

        // add foreign key for table `{{%employee}}`
        $this->addForeignKey(
            '{{%fk-vacation-id_employee}}',
            '{{%vacation}}',
            'id_employee',
            '{{%employee}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_firm`
        $this->createIndex(
            '{{%idx-vacation-id_firm}}',
            '{{%vacation}}',
            'id_firm'
        );

        // add foreign key for table `{{%firm}}`
        $this->addForeignKey(
            '{{%fk-vacation-id_firm}}',
            '{{%vacation}}',
            'id_firm',
            '{{%firm}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_type_vacation`
        $this->createIndex(
            '{{%idx-vacation-id_type_vacation}}',
            '{{%vacation}}',
            'id_type_vacation'
        );

        // add foreign key for table `{{%type_vacation}}`
        $this->addForeignKey(
            '{{%fk-vacation-id_type_vacation}}',
            '{{%vacation}}',
            'id_type_vacation',
            '{{%type_vacation}}',
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
            '{{%fk-vacation-id_employee}}',
            '{{%vacation}}'
        );

        // drops index for column `id_employee`
        $this->dropIndex(
            '{{%idx-vacation-id_employee}}',
            '{{%vacation}}'
        );

        // drops foreign key for table `{{%firm}}`
        $this->dropForeignKey(
            '{{%fk-vacation-id_firm}}',
            '{{%vacation}}'
        );

        // drops index for column `id_firm`
        $this->dropIndex(
            '{{%idx-vacation-id_firm}}',
            '{{%vacation}}'
        );

        // drops foreign key for table `{{%type_vacation}}`
        $this->dropForeignKey(
            '{{%fk-vacation-id_type_vacation}}',
            '{{%vacation}}'
        );

        // drops index for column `id_type_vacation`
        $this->dropIndex(
            '{{%idx-vacation-id_type_vacation}}',
            '{{%vacation}}'
        );

        $this->dropTable('{{%vacation}}');
    }
}
