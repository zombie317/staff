<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%firm}}`.
 */
class m210513_173120_create_firm_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%firm}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string()->notNull(),
            'short_name' => $this->string()->notNull(),
            'legal_address' => $this->string(),
            'mail_address' => $this->string(),
            'inn' => $this->integer(),
            'kpp' => $this->integer(),
            'bik' => $this->integer(),
            'bank_account' => $this->bigInteger(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'site' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%firm}}');
    }
}
