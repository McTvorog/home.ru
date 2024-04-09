<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderstatus".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 *
 * @property Order[] $orders
 */
class Orderstatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderstatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name', 'code'], 'string', 'max' => 255],
            [['code'], 'unique'],
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
        return $this->hasMany(Order::class, ['orderstatus_id' => 'id']);
    }
}
