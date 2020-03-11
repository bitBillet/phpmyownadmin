<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%columns}}`.
 */
class m200311_181939_create_columns_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("INSERT INTO edit_tables (table_name) VALUES ('columns')");
        $this->createTable('{{%columns}}', [
            'id' => $this->primaryKey(),
            'column_name' => $this->string(),
            'column_type' => $this->string(),
            'table_id' => $this->integer(),
            'title' => $this->string(),
        ]);
        $this->createIndex(
            'idx-column_to_table',
            'columns',
            'table_id'
        );

        $this->addForeignKey(
            'column_to_table',
            'columns',
            'table_id',
            'edit_tables',
            'id',
            'CASCADE'
        );
        $this->execute("INSERT INTO columns (column_name, column_type, table_id) VALUES ('table_name', 'string', 1)");
        $this->execute("INSERT INTO columns (column_name, column_type, table_id) VALUES ('column_name', 'string', 2)");
        $this->execute("INSERT INTO columns (column_name, column_type, table_id) VALUES ('column_type', 'string', 2)");
        $this->execute("INSERT INTO columns (column_name, column_type, table_id) VALUES ('table_id', 'integer', 2)");
        $this->execute("INSERT INTO columns (column_name, column_type, table_id) VALUES ('title', 'string', 2)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'column_to_table',
            'columns'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-column_to_table',
            'columns'
        );
        $this->dropTable('{{%columns}}');
    }
}
