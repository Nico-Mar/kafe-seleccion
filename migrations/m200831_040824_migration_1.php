<?php

use yii\db\Migration;

/**
 * Class m200831_040824_migration_1
 */
class m200831_040824_migration_1 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('registro', [
            'id' => $this->primaryKey('10'),
            'nombre' => $this->string('255')->notNull(),
            'apellido' => $this->string('255')->notNull(),
            'fecha_nacimiento' => $this->date()->notNull(),
            'email'=> $this->string('255')->notNull()->unique(),
            'dni' => $this->integer('8')->notNull()->unique(),
            'id_referente' => $this->integer('10')->defaultValue(NULL)
            ], );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200831_040824_migration_1 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200831_040824_migration_1 cannot be reverted.\n";

        return false;
    }
    */
}
