<?php

use yii\db\Migration;

/**
 * Handles adding mpaa_id to table `{{%film}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%mpaa}}`
 */
class m190724_182807_add_mpaa_id_column_to_film_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%film}}', 'mpaa_id', $this->integer());

        // creates index for column `mpaa_id`
        $this->createIndex(
            '{{%idx-film-mpaa_id}}',
            '{{%film}}',
            'mpaa_id'
        );

        // add foreign key for table `{{%mpaa}}`
        $this->addForeignKey(
            '{{%fk-film-mpaa_id}}',
            '{{%film}}',
            'mpaa_id',
            '{{%mpaa}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%mpaa}}`
        $this->dropForeignKey(
            '{{%fk-film-mpaa_id}}',
            '{{%film}}'
        );

        // drops index for column `mpaa_id`
        $this->dropIndex(
            '{{%idx-film-mpaa_id}}',
            '{{%film}}'
        );

        $this->dropColumn('{{%film}}', 'mpaa_id');
    }
}
