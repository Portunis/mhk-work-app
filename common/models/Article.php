<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $url
 * @property int|null $user_id
 * @property int|null $status
 *
 * @property User $user
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [[ 'title', 'description',  'url'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['user_id'],'default', 'value' => Yii::$app->user->identity->getId()],
            [['status'],'default', 'value' => 0],
            [['description'], 'string'],
            [['title', 'url'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'url' => 'Url',
            'user_id' => 'User ID',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public static function getStatusList(){
        return ['Модерация','Опубликовано'];
    }
    public function getStatusName(){
        $list = self::getStatusList();
        return $list[$this->status];
    }
}
