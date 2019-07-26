<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%producer_actor}}`.
 */
class m190724_172345_create_producer_actor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%producer_actor}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'birthday' => $this->date(),
            'height' => $this->smallInteger(),
            'image_url' => $this->text(),
            'function' => $this->string(),
            'slug' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%producer_actor}}');
    }
}
