<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_film}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%film}}`
 */
class m190725_074618_create_junction_table_for_user_and_film_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_film}}', [
            'user_id' => $this->integer(),
            'film_id' => $this->integer(),
            'PRIMARY KEY(user_id, film_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_film-user_id}}',
            '{{%user_film}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_film-user_id}}',
            '{{%user_film}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-user_film-film_id}}',
            '{{%user_film}}',
            'film_id'
        );

        // add foreign key for table `{{%film}}`
        $this->addForeignKey(
            '{{%fk-user_film-film_id}}',
            '{{%user_film}}',
            'film_id',
            '{{%film}}',
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
            '{{%fk-user_film-user_id}}',
            '{{%user_film}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_film-user_id}}',
            '{{%user_film}}'
        );

        // drops foreign key for table `{{%film}}`
        $this->dropForeignKey(
            '{{%fk-user_film-film_id}}',
            '{{%user_film}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-user_film-film_id}}',
            '{{%user_film}}'
        );

        $this->dropTable('{{%user_film}}');
    }
}
