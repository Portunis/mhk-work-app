<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $date
 * @property int|null $user_id
 * @property int|null $employee_id
 * @property int|null $status
 *
 * @property Requests[] $requests
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['user_id'],'default', 'value' => Yii::$app->user->identity->getId()],
            [['status'],'default', 'value' => 0],
            [['date'], 'safe'],
            [['user_id', 'employee_id', 'status'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'date' => 'Дата',
            'user_id' => '',
            'employee_id' => 'Врач',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasOne(User::className(), ['id' => 'employee_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
