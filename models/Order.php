<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $user_id Кто делает заявку
 * @property string $datatime_start
 * @property string $equipment
 * @property int $type_id тип неисправности
 * @property string $description
 * @property int $orderstatus_id
 * @property int|null $responsible_id ответственный за выполнение работ
 * @property string $datatime_end
 * @property string|null $comment
 * @property int $prioritet_id
 *
 * @property Orderstatus $orderstatus
 * @property Orderuser[] $orderusers
 * @property Prioritet $prioritet
 * @property User $responsible
 * @property Type $type
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'datatime_start', 'equipment', 'type_id', 'description', 'orderstatus_id', 'datatime_end'], 'required'],
            [['user_id', 'type_id', 'orderstatus_id', 'responsible_id', 'prioritet_id'], 'integer'],
            [['datatime_start', 'datatime_end'], 'safe'],
            [['description', 'comment'], 'string'],
            [['equipment'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['type_id' => 'id']],
            [['orderstatus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orderstatus::class, 'targetAttribute' => ['orderstatus_id' => 'id']],
            [['responsible_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['responsible_id' => 'id']],
            [['prioritet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prioritet::class, 'targetAttribute' => ['prioritet_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'datatime_start' => 'Datatime Start',
            'equipment' => 'Equipment',
            'type_id' => 'Type ID',
            'description' => 'Description',
            'orderstatus_id' => 'Orderstatus ID',
            'responsible_id' => 'Responsible ID',
            'datatime_end' => 'Datatime End',
            'comment' => 'Comment',
            'prioritet_id' => 'Prioritet ID',
        ];
    }

    /**
     * Gets query for [[Orderstatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderstatus()
    {
        return $this->hasOne(Orderstatus::class, ['id' => 'orderstatus_id']);
    }

    /**
     * Gets query for [[Orderusers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderusers()
    {
        return $this->hasMany(Orderuser::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Prioritet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrioritet()
    {
        return $this->hasOne(Prioritet::class, ['id' => 'prioritet_id']);
    }

    /**
     * Gets query for [[Responsible]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResponsible()
    {
        return $this->hasOne(User::class, ['id' => 'responsible_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
