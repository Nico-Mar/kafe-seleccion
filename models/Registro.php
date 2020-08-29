<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "registro".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_nacimiento
 * @property string $email
 * @property string $dni
 * @property int|null $id_referente
 *
 * @property Registro $referente
 * @property Registro[] $registros
 */
class Registro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'fecha_nacimiento', 'email', 'dni'], 'required'],
            [['fecha_nacimiento'], 'revisarFecha'],
            [['id_referente'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 45],
            [['email'], 'email'],
            [['dni'], 'string', 'max' => 8],
            [['id_referente'], 'exist', 'skipOnError' => true, 'targetClass' => Registro::className(), 'targetAttribute' => ['id_referente' => 'id']],
        ];
    }

    public function revisarFecha($atribute, $params){

        $hoy = date('Y-m-d');
        $fechaSeleccionada = date($this->fecha_nacimiento);
        if ($fechaSeleccionada > $hoy) {
            $this->addError($atribute,'Debe ser mayor de 18 años para registrarse.');
        }
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fecha_nacimiento' => 'Fecha de Nacimiento',
            'email' => 'Email',
            'dni' => 'DNI',
            'id_referente' => 'Referente',
        ];
    }

    /**
     * Gets query for [[Referente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReferente()
    {
        return $this->hasOne(Registro::className(), ['id' => 'id_referente']);
    }

    /**
     * Gets query for [[Registros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegistros()
    {
        return $this->hasMany(Registro::className(), ['id_referente' => 'id']);
    }
}
