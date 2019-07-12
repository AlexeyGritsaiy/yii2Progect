<?php

use yii\db\Migration;

/**
 * Class m190627_181846_tbl_subscribe
 */
class m190627_181846_tbl_subscribe extends Migration
{
    public function up()
    {
        $this->execute("
        CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `date_subscribe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
        ");
    }

    public function down()
    {
        $this->dropTable('{{%subscribe}}');
    }
}
