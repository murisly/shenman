<?php

use yii\db\Migration;

class m160816_104534_add_country extends Migration
{
    private $table = "{{%country}}";

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === "mysql") {
            $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        }

        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'code' => $this->string(10)->defaultValue(""),
            'name' => $this->string(10)->defaultValue("")->comment("国家"),
            'population' => $this->integer()->defaultValue(0),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable($this->table);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
