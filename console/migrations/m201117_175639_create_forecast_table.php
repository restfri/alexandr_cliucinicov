<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%forecast}}`.
 */
class m201117_175639_create_forecast_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%forecast}}', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer(),
            'temperature' => $this->float(),
            'when_created' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%forecast}}');
    }
}
