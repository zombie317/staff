<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%staffing_plan}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%position}}`
 * - `{{%department}}`
 */
class m210513_174102_create_staffing_plan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%staffing_plan}}', [
            'id' => $this->primaryKey(),
            'id_position' => $this->integer()->notNull(),
            'id_department' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_position`
        $this->createIndex(
            '{{%idx-staffing_plan-id_position}}',
            '{{%staffing_plan}}',
            'id_position'
        );

        // add foreign key for table `{{%position}}`
        $this->addForeignKey(
            '{{%fk-staffing_plan-id_position}}',
            '{{%staffing_plan}}',
            'id_position',
            '{{%position}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_department`
        $this->createIndex(
            '{{%idx-staffing_plan-id_department}}',
            '{{%staffing_plan}}',
            'id_department'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-staffing_plan-id_department}}',
            '{{%staffing_plan}}',
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
        // drops foreign key for table `{{%position}}`
        $this->dropForeignKey(
            '{{%fk-staffing_plan-id_position}}',
            '{{%staffing_plan}}'
        );

        // drops index for column `id_position`
        $this->dropIndex(
            '{{%idx-staffing_plan-id_position}}',
            '{{%staffing_plan}}'
        );

        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-staffing_plan-id_department}}',
            '{{%staffing_plan}}'
        );

        // drops index for column `id_department`
        $this->dropIndex(
            '{{%idx-staffing_plan-id_department}}',
            '{{%staffing_plan}}'
        );

        $this->dropTable('{{%staffing_plan}}');
    }
}
