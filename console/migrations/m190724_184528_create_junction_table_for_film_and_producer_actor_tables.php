<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%film_producer_actor}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%film}}`
 * - `{{%producer_actor}}`
 */
class m190724_184528_create_junction_table_for_film_and_producer_actor_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%film_producer_actor}}', [
            'film_id' => $this->integer(),
            'producer_actor_id' => $this->integer(),
            'PRIMARY KEY(film_id, producer_actor_id)',
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-film_producer_actor-film_id}}',
            '{{%film_producer_actor}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-film_producer_actor-film_id}}',
            '{{%film_producer_actor}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `producer_actor_id`
        $this->createIndex(
            '{{%idx-film_producer_actor-producer_actor_id}}',
            '{{%film_producer_actor}}',
            'producer_actor_id'
        );

        // add foreign key for table `{{%producer_actor}}`
        $this->addForeignKey(
            '{{%fk-film_producer_actor-producer_actor_id}}',
            '{{%film_producer_actor}}',
            'producer_actor_id',
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
        // drops foreign key for table `{{%film}}`
        $this->dropForeignKey(
            '{{%fk-film_producer_actor-film_id}}',
            '{{%film_producer_actor}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-film_producer_actor-film_id}}',
            '{{%film_producer_actor}}'
        );

        // drops foreign key for table `{{%producer_actor}}`
        $this->dropForeignKey(
            '{{%fk-film_producer_actor-producer_actor_id}}',
            '{{%film_producer_actor}}'
        );

        // drops index for column `producer_actor_id`
        $this->dropIndex(
            '{{%idx-film_producer_actor-producer_actor_id}}',
            '{{%film_producer_actor}}'
        );

        $this->dropTable('{{%film_producer_actor}}');
    }
}
