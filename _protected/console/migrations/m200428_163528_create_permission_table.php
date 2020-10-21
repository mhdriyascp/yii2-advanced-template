<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%permission}}`.
 */
class m200428_163528_create_permission_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%permission}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer(11)->unique(),
            'name'=>$this->string(50)->notNull(),
            'controller_name'=>$this->string(50)->notNull(),
            'action_name'=>$this->string(50)->notNull(),
            'created_on'=> $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull()->unique(),
            'created_by'=> $this->integer(11)->unique(),
            'updated_by'=> $this->integer(11)->unique(),
            'updated_on'=> $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%permission}}');
    }
}