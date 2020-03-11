<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 */
class m200311_181450_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("INSERT INTO edit_tables (table_name) VALUES ('edit_tables')");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
