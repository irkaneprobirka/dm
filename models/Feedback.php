<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $full_name
 * @property string $phone
 * @property string $text
 * @property string $image
 */
class Feedback extends \yii\db\ActiveRecord
{

    public $imageFile;
    public $rules;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'phone', 'text'], 'required'],
            [['text'], 'string'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
            [['full_name', 'phone', 'image'], 'string', 'max' => 255],
            ['phone', 'match', 'pattern' => '/^\+7\(\d{3}\)\-\d{3}(\-\d{2}){2}$/'],
            ['full_name', 'match', 'pattern' => '/^([а-яё]+\s){2}[а-яё]+$/ui'],
            ['rules', 'required', 'requiredValue' => 1, 'message' => 'Соглашение с правилами должно быть заполнено'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'phone' => 'Phone',
            'text' => 'Text',
            'image' => 'Image',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $fileName = Yii::$app->user->id
                . time()
                . '.'
                . $this->imageFile->extension;
            $this->imageFile->saveAs('uploads/' . $fileName);
            $this->image = "/web/uploads/" . $fileName;
            return true;
        } else {
            return false;
        }
    }
}
