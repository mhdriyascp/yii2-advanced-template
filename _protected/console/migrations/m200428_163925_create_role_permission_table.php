<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role_permission}}`.
 */
class m200428_163925_create_role_permission_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role_permission}}', [
            'id' => $this->primaryKey(),
            'permission_id' => $this->integer(11)->notNull()->unique(),
            'role_id' => $this->integer(11)->notNull()->unique(),
            'created_on'=> $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
            'created_by'=> $this->integer(11)->notNull()->unique(),
            'updated_by'=> $this->integer(11)->unique(),
            'updated_on'=> $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'status'=> $this->smallInteger(2)->notNull()->defaultValue(1),
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%role_permission}}');
    }
}