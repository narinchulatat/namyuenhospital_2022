<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;

/**
 * This is the model class for table "Freelancee".
 *
 * @property integer $id
 * @property string $ref
 * @property string $title
 * @property string $description
 * @property string $covenant
 * @property string $docs
 * @property string $start_date
 * @property string $end_date
 * @property string $success_date
 * @property string $create_date
 */
class Freelancee extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER = 'freelancees';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'freelancee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['start_date', 'end_date', 'success_date', 'create_date', 'docs'], 'safe'],
            [['ref'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 255],
            [['covenant'], 'file', 'maxFiles' => 1],
            [['docs'], 'file', 'maxFiles' => 10, 'skipOnEmpty' => true]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'หลายเลข referent สำหรับอัพโหลดไฟล์ ajax',
            'title' => 'ชื่อไฟล์',
            'description' => 'รายละเอียด',
            'covenant' => 'เอกสารประกอบ',
            'docs' => 'เอกสารประกอบ',
            'start_date' => 'วันที่เริ่ม',
            'end_date' => 'วันที่สิ้นสุด',
            'success_date' => 'งานเสร็จวันที่',
            'create_date' => 'วันที่อัพโหลด',
        ];
    }

    public static function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/';
    }

    public function listDownloadFiles($type)
    {
        $docs_file = '';
        if (in_array($type, ['docs', 'covenant'])) {
            $data = $type === 'docs' ? $this->docs : $this->covenant;
            $files = Json::decode($data);
            if (is_array($files)) {
                $docs_file = '<ul>';
                foreach ($files as $key => $value) {
                    $docs_file .= '<li>' . Html::a($value, ['/freelancee/download', 'id' => $this->id, 'file' => $key, 'file_name' => $value]) . '</li>';
                }
                $docs_file .= '</ul>';
            }
        }

        return $docs_file;
    }

    public function initialPreview($data, $field, $type = 'file')
    {
        $initial = [];
        $files = Json::decode($data);
        if (is_array($files)) {
            foreach ($files as $key => $value) {
                if ($type == 'file') {
                    $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                } elseif ($type == 'config') {
                    $initial[] = [
                        'caption' => $value,
                        'width'  => '120px',
                        'url'    => Url::to(['/freelancee/deletefile', 'id' => $this->id, 'fileName' => $key, 'field' => $field]),
                        'key'    => $key
                    ];
                } else {
                    $initial[] = Html::img(self::getUploadUrl() . $this->ref . '/' . $value, ['class' => 'file-preview-image', 'alt' => $model->file_name, 'title' => $model->file_name]);
                }
            }
        }
        return $initial;
    }
}
