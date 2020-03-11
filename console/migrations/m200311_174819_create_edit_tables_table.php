<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%edit_tables}}`.
 */
class m200311_174819_create_edit_tables_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%edit_tables}}', [
            'id' => $this->primaryKey(),
            'table_name' => $this->string(),
        ]);
        $this->execute("INSERT INTO `edit_tables` (`table_name`) VALUES ('edit_tables')");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%edit_tables}}');
    }
}
