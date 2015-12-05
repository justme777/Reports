<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property integer $unit_id
 * @property integer $deleted
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'unit_id'], 'required'],
            [['category_id', 'unit_id', 'deleted'], 'integer'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'name' => Yii::t('app', 'name'),
            'unit_id' => Yii::t('app', 'Unit ID'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }
    
    public function getDicUnit(){
        return $this->hasOne(DicUnit::className(), ['id' => 'unit_id']);
    }
    
    public function setDicUnit($value){
        $this->DicUnit=$value;
    }
    
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    
    public function setCategory($value){
        $this->category = $value;
    }
}
