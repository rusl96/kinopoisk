<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mpaa}}`.
 */
class m190724_175510_create_mpaa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mpaa}}', [
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
        $this->dropTable('{{%mpaa}}');
    }
}
