<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vo_prices`.
 */
class m170209_183043_create_vo_prices_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
       $tables = Yii::$app->db->schema->getTableNames();
       $dbType = $this->db->driverName;
       $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
       $tableOptions_mssql = "";
       $tableOptions_pgsql = "";
       $tableOptions_sqlite = "";
       /* MYSQL */
       if (!in_array('vo_prices', $tables))  { 
       if ($dbType == "mysql") {
               $this->createTable('{{%vo_prices}}', [
                       'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                       0 => 'PRIMARY KEY (`id`)',
                       'code' => 'VARCHAR(20) NOT NULL',
                       'type' => 'INT(11) NOT NULL',
                       'name' => 'VARCHAR(255) NOT NULL',
                       'close' => 'DOUBLE NULL',
                       'timestamp' => 'VARCHAR(25) NULL',
                       'open' => 'DOUBLE NULL',
                       'high' => 'DOUBLE NULL',
                       'low' => 'DOUBLE NULL',
               ], $tableOptions_mysql);
       }
       }


       $this->execute('SET foreign_key_checks = 0');
       $this->insert('{{%vo_prices}}',['id'=>'3','code'=>'RTSSTD.ME','type'=>'1','name'=>'RTS Standard','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'4','code'=>'RTSI.ME','type'=>'1','name'=>'РТС','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'5','code'=>'RTS2.ME','type'=>'1','name'=>'RTS2','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'6','code'=>'MICEXINDEXCF.ME','type'=>'1','name'=>'ММВБ','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'7','code'=>'MICEX10INDEX.ME','type'=>'1','name'=>'ММВБ 10','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'8','code'=>'^GSPC','type'=>'2','name'=>'S&P 500','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'9','code'=>'^DJI','type'=>'2','name'=>'DOW 30','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'10','code'=>'^NDX','type'=>'2','name'=>'NASDAQ 100','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'11','code'=>'^GSPTSE','type'=>'2','name'=>'S&P/TSX','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'12','code'=>'^BVSP','type'=>'2','name'=>'Bovespa','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'13','code'=>'^FCHI','type'=>'3','name'=>'CAC 40','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'14','code'=>'^GDAXI','type'=>'3','name'=>'DAX','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'15','code'=>'^IBEX','type'=>'3','name'=>'IBEX 35','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'16','code'=>'^STOXX50E','type'=>'3','name'=>'Euro Stoxx 50','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'17','code'=>'GCJ17.CMX','type'=>'4','name'=>'Золото','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'18','code'=>'SIH17.CMX','type'=>'4','name'=>'Серебро','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'19','code'=>'HGH17.CMX','type'=>'4','name'=>'Медь','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'20','code'=>'PLJ17.NYM','type'=>'4','name'=>'Платина','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'21','code'=>'BZJ17.NYM','type'=>'4','name'=>'Нефть Brent','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'22','code'=>'NGJ17.NYM','type'=>'4','name'=>'Природный газ','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'23','code'=>'HOH17.NYM','type'=>'4','name'=>'Мазут','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'24','code'=>'KCH17.NYB','type'=>'4','name'=>'Кофе','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'25','code'=>'CH17.CBT','type'=>'4','name'=>'Кукуруза','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'26','code'=>'KWN17.CBT','type'=>'4','name'=>'Пшеница','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'27','code'=>'CLJ17.NYM','type'=>'4','name'=>'Нефть WTI','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'28','code'=>'EURUSD=X','type'=>'5','name'=>'EUR/USD','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'29','code'=>'GBPUSD=X','type'=>'5','name'=>'GBP/USD','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'30','code'=>'JPY=X','type'=>'5','name'=>'USD/JPY','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'31','code'=>'CHF=X','type'=>'5','name'=>'USD/CHF','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'32','code'=>'AUDUSD=X','type'=>'5','name'=>'AUD/USD','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'33','code'=>'CAD=X','type'=>'5','name'=>'USD/CAD','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'34','code'=>'NZDUSD=X','type'=>'5','name'=>'NZD/USD','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'35','code'=>'EURJPY=X','type'=>'5','name'=>'EUR/JPY','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'36','code'=>'RUB=X','type'=>'5','name'=>'USD/RUB','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->insert('{{%vo_prices}}',['id'=>'37','code'=>'EURRUB=X','type'=>'5','name'=>'EUR/RUB','close'=>'','timestamp'=>'','open'=>'','high'=>'','low'=>'']);
       $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `vo_prices`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
