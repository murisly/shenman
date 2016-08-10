<?php

use yii\db\Migration;

class m160808_073951_add_table_member extends Migration
{
    private $table = '{{%member}}';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === "mysql") {
            $tableOptions = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        }

        $this->createTable($this->table, [
            "id" => $this->primaryKey(),
            "name" => $this->string(32)->defaultValue("")->comment("姓名"),
            'sex'  => $this->integer(1)->defaultValue(2)->comment("性别"),
            'address' => $this->string(64)->defaultValue('')->comment('住址'),
            'work' => $this->string(32)->defaultValue('')->comment('所在行业'),
            'job' => $this->string(32)->defaultValue('')->comment('工作'),
            'education' => $this->string(32)->defaultValue('')->comment('教育背景'),
            'homepage' => $this->string(64)->defaultValue('')->comment('主页'),
            'profile' => $this->string(64)->defaultValue('')->comment('个人简介'),

            'agree' => $this->integer()->defaultValue(0)->comment("获得的赞同"),
            'thinks' => $this->integer()->defaultValue(0)->comment("获得的感谢"),
            'question' => $this->integer()->defaultValue(0)->comment("提问"),
            'answer' => $this->integer()->defaultValue(0)->comment("回答"),
            'article' => $this->integer()->defaultValue(0)->comment("文章"),
            'collection' => $this->integer()->defaultValue(0)->comment("收藏"),
            'share' => $this->integer()->defaultValue(0)->comment("分享"),
            'browser' => $this->integer()->defaultValue(0)->comment("主页被浏览次数"),
            'follow' => $this->integer()->defaultValue(0)->comment("关注了"),
            'followedBy' => $this->integer()->defaultValue(0)->comment("关注者"),
            'topic' => $this->integer()->defaultValue(0)->comment("话题"),
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
