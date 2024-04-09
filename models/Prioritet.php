<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prioritet".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 *
 * @property Order[] $orders
 */
class Prioritet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prioritet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name'], 'string'],
            [['code'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['prioritet_id' => 'id']);
    }
}
