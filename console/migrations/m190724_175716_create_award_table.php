<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%award}}`.
 */
class m190724_175716_create_award_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%award}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image_url' => $this->text(),
            'source_url' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%award}}');
    }
}
