<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
/**
 * This is the model class for table "slide".
 *
 * @property integer $id
 * @property string $image
 */
class Slide extends \yii\db\ActiveRecord
{
    public $uploadImageFolder = 'slide/images'; //ที่เก็บรูปภาพ
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slide';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'jpg, png, gif'],//กำหนดให้เป็นแบบ file
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'รูปภาพ',
        ];
    }
    /*
    * UploadImage เป็น Method ในการ upload รูปภาพในที่นี้จะ upload ได้เพียงไฟล์เดียว โดยจะ return ชื่อไฟล์
    */
    public function uploadImage(){

        if($this->validate()){
            if($this->image){
                if($this->isNewRecord){//ถ้าเป็นการเพิ่มใหม่ ให้ตั้งชื่อไฟล์ใหม่
                    $fileName = substr(md5(rand(1,1000).time()),0,15).'.'.$this->image->extension;//เลือกมา 15 อักษร .นามสกุล
                }else{//ถ้าเป็นการ update ให้ใช้ชื่อเดิม
                    $fileName = $this->getOldAttribute('image');
                }
                $this->image->saveAs(Yii::getAlias('@webroot').'/'.$this->uploadImageFolder.'/'.$fileName);

                return $fileName;
            }//end image upload
        }//end validate
        return $this->isNewRecord ? false : $this->getOldAttribute('image'); //ถ้าไม่มีการ upload ให้ใช้ข้อมูลเดิม
    }
    /*
    * getImage เป็น method สำหรับเรียกที่เก็บไฟล์ เพื่อนำไปแสดงผล
    */
    public function getImage()
    {
        return Yii::getAlias('@web').'/'.$this->uploadImageFolder.'/'.$this->image;
    }
    public function getUploadUrl(){
      return Yii::getAlias('@web').'/'.$this->uploadImageFolder.'/';
    }
    public function getPhotoViewer(){
      return empty($this->image) ? Yii::getAlias('@web').'/Slide/images/none.png' : $this->getUploadUrl().$this->image;
    }

    public function getPhotosViewer(){
         $images = $this->image ? @explode(',',$this->image) : [];
         $img = '';
         foreach ($images as  $image) {
           $img.= ' '.Html::img($this->getUploadUrl().$image,['class'=>'img-thumbnail','style'=>'max-width:400px;']);
         }
         return $img;
       }
}
