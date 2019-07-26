<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%producer_actor_award}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%producer_actor}}`
 * - `{{%award}}`
 */
class m190724_184802_create_junction_table_for_producer_actor_and_award_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%producer_actor_award}}', [
            'producer_actor_id' => $this->integer(),
            'award_id' => $this->integer(),
            'PRIMARY KEY(producer_actor_id, award_id)',
        ]);

        // creates index for column `producer_actor_id`
        $this->createIndex(
            '{{%idx-producer_actor_award-producer_actor_id}}',
            '{{%producer_actor_award}}',
            'producer_actor_id'
        );

        // add foreign key for table `{{%producer_actor}}`
        $this->addForeignKey(
            '{{%fk-producer_actor_award-producer_actor_id}}',
            '{{%producer_actor_award}}',
            'producer_actor_id',
            '{{%producer_actor}}',
            'id',
            'CASCADE'
        );

        // creates index for column `award_id`
        $this->createIndex(
            '{{%idx-producer_actor_award-award_id}}',
            '{{%producer_actor_award}}',
            'award_id'
        );

        // add foreign key for table `{{%award}}`
        $this->addForeignKey(
            '{{%fk-producer_actor_award-award_id}}',
            '{{%producer_actor_award}}',
            'award_id',
            '{{%award}}',
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
            '{{%fk-producer_actor_award-producer_actor_id}}',
            '{{%producer_actor_award}}'
        );

        // drops index for column `producer_actor_id`
        $this->dropIndex(
            '{{%idx-producer_actor_award-producer_actor_id}}',
            '{{%producer_actor_award}}'
        );

        // drops foreign key for table `{{%award}}`
        $this->dropForeignKey(
            '{{%fk-producer_actor_award-award_id}}',
            '{{%producer_actor_award}}'
        );

        // drops index for column `award_id`
        $this->dropIndex(
            '{{%idx-producer_actor_award-award_id}}',
            '{{%producer_actor_award}}'
        );

        $this->dropTable('{{%producer_actor_award}}');
    }
}
