<?php

namespace common\models;

use Yii;
use yii\base\Model;

class ImageUpload extends Model{

    public $image;

    public function rules()
    {
        return[
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png,pdf'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'image' => 'Фотография',

        ];
    }

    public function uploadFile($file, $currentImage)
    {

        $this->image =$file;

        if ($this->validate())
        {

            $this->deleteCurrentImage($currentImage);

            return $this->saveImage();


        }
    }

    private function getFolder()
    {
        return Yii::getAlias('@webroot') . '/images/user/';
    }

    private function generateFilename()
    {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }
    public  function deleteCurrentImage($currentImage)
    {
        if ($this->fileExists($currentImage))
        {
            unlink($this->getFolder() . $currentImage);
        }
    }
    public function fileExists($currentImage)
    {
        if (!empty($currentImage) && $currentImage != null)
        {
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    public function saveImage()
    {
        $filename = $this->generateFilename();

        $this->image->saveAs($this->getFolder() . $filename);

        return $filename;
    }


}
