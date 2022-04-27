<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $create_date
 *
 * @property News[] $news
 */
class NewsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'create_date'], 'required'],
            [['create_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID หมวดหมู่',
            'name' => 'หมวดหมู่',
            'create_date' => 'วันที่สร้าง',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['cat_id' => 'id']);
    }
}
