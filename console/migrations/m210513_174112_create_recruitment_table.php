<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recruitment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employee}}`
 * - `{{%firm}}`
 * - `{{%position}}`
 * - `{{%department}}`
 */
class m210513_174112_create_recruitment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recruitment}}', [
            'id' => $this->primaryKey(),
            'number' => $this->string(10)->notNull(),
            'date' => $this->date()->notNull(),
            'id_employee' => $this->integer()->notNull(),
            'id_firm' => $this->integer()->notNull(),
            'id_position' => $this->integer()->notNull(),
            'id_department' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_employee`
        $this->createIndex(
            '{{%idx-recruitment-id_employee}}',
            '{{%recruitment}}',
            'id_employee'
        );

        // add foreign key for table `{{%employee}}`
        $this->addForeignKey(
            '{{%fk-recruitment-id_employee}}',
            '{{%recruitment}}',
            'id_employee',
            '{{%employee}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_firm`
        $this->createIndex(
            '{{%idx-recruitment-id_firm}}',
            '{{%recruitment}}',
            'id_firm'
        );

        // add foreign key for table `{{%firm}}`
        $this->addForeignKey(
            '{{%fk-recruitment-id_firm}}',
            '{{%recruitment}}',
            'id_firm',
            '{{%firm}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_position`
        $this->createIndex(
            '{{%idx-recruitment-id_position}}',
            '{{%recruitment}}',
            'id_position'
        );

        // add foreign key for table `{{%position}}`
        $this->addForeignKey(
            '{{%fk-recruitment-id_position}}',
            '{{%recruitment}}',
            'id_position',
            '{{%position}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_department`
        $this->createIndex(
            '{{%idx-recruitment-id_department}}',
            '{{%recruitment}}',
            'id_department'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-recruitment-id_department}}',
            '{{%recruitment}}',
            'id_department',
            '{{%department}}',
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
            '{{%fk-recruitment-id_employee}}',
            '{{%recruitment}}'
        );

        // drops index for column `id_employee`
        $this->dropIndex(
            '{{%idx-recruitment-id_employee}}',
            '{{%recruitment}}'
        );

        // drops foreign key for table `{{%firm}}`
        $this->dropForeignKey(
            '{{%fk-recruitment-id_firm}}',
            '{{%recruitment}}'
        );

        // drops index for column `id_firm`
        $this->dropIndex(
            '{{%idx-recruitment-id_firm}}',
            '{{%recruitment}}'
        );

        // drops foreign key for table `{{%position}}`
        $this->dropForeignKey(
            '{{%fk-recruitment-id_position}}',
            '{{%recruitment}}'
        );

        // drops index for column `id_position`
        $this->dropIndex(
            '{{%idx-recruitment-id_position}}',
            '{{%recruitment}}'
        );

        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-recruitment-id_department}}',
            '{{%recruitment}}'
        );

        // drops index for column `id_department`
        $this->dropIndex(
            '{{%idx-recruitment-id_department}}',
            '{{%recruitment}}'
        );

        $this->dropTable('{{%recruitment}}');
    }
}
