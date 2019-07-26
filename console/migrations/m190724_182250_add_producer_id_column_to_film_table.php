<?php

use yii\db\Migration;

/**
 * Handles adding producer_id to table `{{%film}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%producer_actor}}`
 */
class m190724_182250_add_producer_id_column_to_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%film}}', 'producer_id', $this->integer());

        // creates index for column `producer_id`
        $this->createIndex(
            '{{%idx-film-producer_id}}',
            '{{%film}}',
            'producer_id'
        );

        // add foreign key for table `{{%producer_actor}}`
        $this->addForeignKey(
            '{{%fk-film-producer_id}}',
            '{{%film}}',
            'producer_id',
            '{{%producer_actor}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%producer_actor}}`
        $this->dropForeignKey(
            '{{%fk-film-producer_id}}',
            '{{%film}}'
        );

        // drops index for column `producer_id`
        $this->dropIndex(
            '{{%idx-film-producer_id}}',
            '{{%film}}'
        );

        $this->dropColumn('{{%film}}', 'producer_id');
    }
}
