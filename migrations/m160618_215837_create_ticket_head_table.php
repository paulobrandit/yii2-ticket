<?php

use yii\db\Migration;

/**
 * Handles the creation for table `ticket_head_table`.
 */
class m160618_215837_create_ticket_head_table extends Migration
{
    private $table = '{{%ticket_head}}';
    private $user = '{{%user}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->table, [
            'id'          => $this->primaryKey(),
            'user_id'     => $this->integer()->notNull(),
            'department'  => $this->string(255),
            'topic'       => $this->string(255),
            'status'      => $this->integer(1)->defaultValue('0')->unsigned(),
            'date_update' => $this->timestamp()->defaultValue(null),
        ]);

        $this->createIndex('i_ticket_head', $this->table, 'user_id');

        $this->addForeignKey('fk_ticket_head', $this->table, 'user_id', $this->user, 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_ticket_head', $this->table);
        $this->dropTable($this->table);
    }
}
