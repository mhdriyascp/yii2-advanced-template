<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%permission_group}}`.
 */
class m200428_163553_create_permission_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%permission_group}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
            'status'=> $this->smallInteger(2)->notNull()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%permission_group}}');
    }
}