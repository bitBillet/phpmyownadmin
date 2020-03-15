<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%script_history}}`.
 */
class m200315_220705_create_script_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%script_history}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text(),
            'date' =>$this->timestamp(),
        ]);
        $this->execute("INSERT INTO edit_tables (table_name) VALUES ('script_history')");
        $this->execute("INSERT INTO columns (column_name, column_type, table_id) VALUES ('text', 'string', 3)");
        $this->execute("INSERT INTO columns (column_name, column_type, table_id) VALUES ('date', 'string', 3)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%script_history}}');
    }
}
