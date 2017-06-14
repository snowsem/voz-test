<?php

use yii\db\Migration;

/**
 * Handles the creation of table `telephone`.
 */
class m170614_084721_create_telephone_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('telephone', [
            'id' => $this->primaryKey(),
            'telephone' => $this->string(),
            'city_id' => $this->string(),
            'contact_id' => $this->string(),
            'telephone_clean' => $this->string(),
            'user_id' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('telephone');
    }
}
