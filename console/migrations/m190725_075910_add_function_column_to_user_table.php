<?php

use yii\db\Migration;

/**
 * Handles adding function to table `{{%user}}`.
 */
class m190725_075910_add_function_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'function', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'function');
    }
}
