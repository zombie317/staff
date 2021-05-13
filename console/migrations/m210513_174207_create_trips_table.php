<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trips}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employee}}`
 * - `{{%firm}}`
 */
class m210513_174207_create_trips_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trips}}', [
            'id' => $this->primaryKey(),
            'number' => $this->string(10)->notNull(),
            'date' => $this->date()->notNull(),
            'id_employee' => $this->integer()->notNull(),
            'id_firm' => $this->integer()->notNull(),
            'place' => $this->string(),
            'date_start' => $this->date()->notNull(),
            'date_end' => $this->date()->notNull(),
            'quantity_days' => $this->integer()->notNull(),
            'cause' => $this->string(),
        ]);

        // creates index for column `id_employee`
        $this->createIndex(
            '{{%idx-trips-id_employee}}',
            '{{%trips}}',
            'id_employee'
        );

        // add foreign key for table `{{%employee}}`
        $this->addForeignKey(
            '{{%fk-trips-id_employee}}',
            '{{%trips}}',
            'id_employee',
            '{{%employee}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_firm`
        $this->createIndex(
            '{{%idx-trips-id_firm}}',
            '{{%trips}}',
            'id_firm'
        );

        // add foreign key for table `{{%firm}}`
        $this->addForeignKey(
            '{{%fk-trips-id_firm}}',
            '{{%trips}}',
            'id_firm',
            '{{%firm}}',
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
            '{{%fk-trips-id_employee}}',
            '{{%trips}}'
        );

        // drops index for column `id_employee`
        $this->dropIndex(
            '{{%idx-trips-id_employee}}',
            '{{%trips}}'
        );

        // drops foreign key for table `{{%firm}}`
        $this->dropForeignKey(
            '{{%fk-trips-id_firm}}',
            '{{%trips}}'
        );

        // drops index for column `id_firm`
        $this->dropIndex(
            '{{%idx-trips-id_firm}}',
            '{{%trips}}'
        );

        $this->dropTable('{{%trips}}');
    }
}
