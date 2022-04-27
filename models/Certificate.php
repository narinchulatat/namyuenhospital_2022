<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "certificate".
 *
 * @property int $id
 * @property string|null $date_certificate วันที่ขอหนังสือ
 * @property string|null $fullname ผู้ยื่นคำขอ
 * @property int|null $a_1 หนังสือรับรองเงินเดือน
 * @property int|null $a_2 สำเนาสัญญาจ้าง
 * @property int|null $a_3 สำเนาคำสั่งจ้าง
 * @property int|null $a_4 อื่นๆ
 * @property string|null $fullname_1 รายชื่อผู้ขอคนที่ 1
 * @property string|null $fullname_2 รายชื่อผู้ขอคนที่ 2
 * @property string|null $fullname_3 รายชื่อผู้ขอคนที่ 3
 */
class Certificate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'certificate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_certificate'], 'safe'],
            [['a_1', 'a_2', 'a_3'], 'integer'],
            [['fullname', 'fullname_1', 'fullname_2', 'fullname_3', 'a_4'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_certificate' => 'วันที่ขอหนังสือ',
            'fullname' => 'ผู้ยื่นคำขอ',
            'a_1' => 'หนังสือรับรองเงินเดือน',
            'a_2' => 'สำเนาสัญญาจ้าง',
            'a_3' => 'สำเนาคำสั่งจ้าง',
            'a_4' => 'อื่นๆ',
            'fullname_1' => 'รายชื่อผู้ขอคนที่ 1',
            'fullname_2' => 'รายชื่อผู้ขอคนที่ 2',
            'fullname_3' => 'รายชื่อผู้ขอคนที่ 3',
        ];
    }
}
