<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m190724_165329_create_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'tagline' => $this->text(),
            'image_url' => $this->text(),
            'video_url' => $this->text(),
            'slug' => $this->string(),
            'global_rating' => $this->decimal(3,1),
            'country' => $this->string(),
            'year' => $this->decimal(4,0),
            'duration' => $this->time(),
            'local_rating' => $this->decimal(2,1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%film}}');
    }
}
