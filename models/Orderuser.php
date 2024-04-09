<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderuser".
 *
 * @property int $id
 * @property int $order_id
 * @property int $comment
 * @property int $executor_id исполнитель
 *
 * @property User $executor
 * @property Order $order
 */
class Orderuser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderuser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'comment', 'executor_id'], 'required'],
            [['order_id', 'comment', 'executor_id'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            [['executor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['executor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'comment' => 'Comment',
            'executor_id' => 'Executor ID',
        ];
    }

    /**
     * Gets query for [[Executor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExecutor()
    {
        return $this->hasOne(User::class, ['id' => 'executor_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }
}
