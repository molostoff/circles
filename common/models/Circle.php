<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "circles".
 *
 * @property integer $id
 * @property integer $x
 * @property integer $y
 * @property integer $radius
 * @property integer $color
 */
class Circle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'circles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['x', 'y', 'radius', 'color'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'x' => 'X',
            'y' => 'Y',
            'radius' => 'Радиус',
            'color' => 'Цвет',
        ];
    }

    /**
     * @inheritdoc
     * @return CirclesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CirclesQuery(get_called_class());
    }
}
