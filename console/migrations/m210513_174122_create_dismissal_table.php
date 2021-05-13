<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dismissal}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%employee}}`
 * - `{{%firm}}`
 * - `{{%position}}`
 * - `{{%department}}`
 */
class m210513_174122_create_dismissal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dismissal}}', [
            'id' => $this->primaryKey(),
            'number' => $this->string(10)->notNull(),
            'date' => $this->date()->notNull(),
            'id_employee' => $this->integer()->notNull(),
            'id_firm' => $this->integer()->notNull(),
            'id_position' => $this->integer()->notNull(),
            'id_department' => $this->integer()->notNull(),
            'article' => $this->string()->notNull(),
            'cause' => $this->string(),
        ]);

        // creates index for column `id_employee`
        $this->createIndex(
            '{{%idx-dismissal-id_employee}}',
            '{{%dismissal}}',
            'id_employee'
        );

        // add foreign key for table `{{%employee}}`
        $this->addForeignKey(
            '{{%fk-dismissal-id_employee}}',
            '{{%dismissal}}',
            'id_employee',
            '{{%employee}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_firm`
        $this->createIndex(
            '{{%idx-dismissal-id_firm}}',
            '{{%dismissal}}',
            'id_firm'
        );

        // add foreign key for table `{{%firm}}`
        $this->addForeignKey(
            '{{%fk-dismissal-id_firm}}',
            '{{%dismissal}}',
            'id_firm',
            '{{%firm}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_position`
        $this->createIndex(
            '{{%idx-dismissal-id_position}}',
            '{{%dismissal}}',
            'id_position'
        );

        // add foreign key for table `{{%position}}`
        $this->addForeignKey(
            '{{%fk-dismissal-id_position}}',
            '{{%dismissal}}',
            'id_position',
            '{{%position}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_department`
        $this->createIndex(
            '{{%idx-dismissal-id_department}}',
            '{{%dismissal}}',
            'id_department'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-dismissal-id_department}}',
            '{{%dismissal}}',
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
            '{{%fk-dismissal-id_employee}}',
            '{{%dismissal}}'
        );

        // drops index for column `id_employee`
        $this->dropIndex(
            '{{%idx-dismissal-id_employee}}',
            '{{%dismissal}}'
        );

        // drops foreign key for table `{{%firm}}`
        $this->dropForeignKey(
            '{{%fk-dismissal-id_firm}}',
            '{{%dismissal}}'
        );

        // drops index for column `id_firm`
        $this->dropIndex(
            '{{%idx-dismissal-id_firm}}',
            '{{%dismissal}}'
        );

        // drops foreign key for table `{{%position}}`
        $this->dropForeignKey(
            '{{%fk-dismissal-id_position}}',
            '{{%dismissal}}'
        );

        // drops index for column `id_position`
        $this->dropIndex(
            '{{%idx-dismissal-id_position}}',
            '{{%dismissal}}'
        );

        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-dismissal-id_department}}',
            '{{%dismissal}}'
        );

        // drops index for column `id_department`
        $this->dropIndex(
            '{{%idx-dismissal-id_department}}',
            '{{%dismissal}}'
        );

        $this->dropTable('{{%dismissal}}');
    }
}
