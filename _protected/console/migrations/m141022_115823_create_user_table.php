<?php
use yii\db\Migration;

class m141022_115823_create_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') 
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        /* $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'account_activation_token' => $this->string(),          
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions); */
       
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'role_id'=> $this->integer(11)->unique(),
            'first_name'=> $this->string(50),
            'last_name' => $this->string(50),
            'username'  => $this->string(255)->notNull()->unique(),
            'email'     => $this->string(255)->notNull()->unique(),
            'phone'     => $this->string(25),
            'password_hash' => $this->string(255)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_reset_token' => $this->string(255)->unique(),
            'account_activation_token'=> $this->string(255),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
            'updated_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'status'=> $this->smallInteger(6)->notNull()->defaultValue(1),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}