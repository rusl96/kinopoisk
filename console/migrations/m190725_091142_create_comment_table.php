<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%film}}`
 * - `{{%producer_actor}}`
 * - `{{%comment}}`
 */
class m190725_091142_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'film_id' => $this->integer()->null(),
            'producer_actor_id' => $this->integer()->null(),
            'parent_id' => $this->integer()->null(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-comment-created_by}}',
            '{{%comment}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-comment-created_by}}',
            '{{%comment}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-comment-updated_by}}',
            '{{%comment}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-comment-updated_by}}',
            '{{%comment}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-comment-film_id}}',
            '{{%comment}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-comment-film_id}}',
            '{{%comment}}',
            'film_id',
            '{{%film}}',
            'id',
            'CASCADE'
        );

        // creates index for column `producer_actor_id`
        $this->createIndex(
            '{{%idx-comment-producer_actor_id}}',
            '{{%comment}}',
            'producer_actor_id'
        );

        // add foreign key for table `{{%producer_actor}}`
        $this->addForeignKey(
            '{{%fk-comment-producer_actor_id}}',
            '{{%comment}}',
            'producer_actor_id',
            '{{%producer_actor}}',
            'id',
            'CASCADE'
        );

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-comment-parent_id}}',
            '{{%comment}}',
            'parent_id'
        );

        // add foreign key for table `{{%comment}}`
        $this->addForeignKey(
            '{{%fk-comment-parent_id}}',
            '{{%comment}}',
            'parent_id',
            '{{%comment}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-comment-created_by}}',
            '{{%comment}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-comment-created_by}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-comment-updated_by}}',
            '{{%comment}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-comment-updated_by}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%film}}`
        $this->dropForeignKey(
            '{{%fk-comment-film_id}}',
            '{{%comment}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-comment-film_id}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%producer_actor}}`
        $this->dropForeignKey(
            '{{%fk-comment-producer_actor_id}}',
            '{{%comment}}'
        );

        // drops index for column `producer_actor_id`
        $this->dropIndex(
            '{{%idx-comment-producer_actor_id}}',
            '{{%comment}}'
        );

        // drops foreign key for table `{{%comment}}`
        $this->dropForeignKey(
            '{{%fk-comment-parent_id}}',
            '{{%comment}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-comment-parent_id}}',
            '{{%comment}}'
        );

        $this->dropTable('{{%comment}}');
    }
}
