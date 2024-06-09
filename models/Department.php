<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $title
 *
 * @property Application[] $applications
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['department_id' => 'id']);
    }

    public static function getDepartment()
    {
        return (new Query())
            ->select('title')
            ->from('department')
            ->indexBy('id')
            ->column();
    }
}
