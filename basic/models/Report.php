<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property integer $id
 * @property string $create_date
 * @property string $report_date
 * @property integer $task_id
 * @property string $value
 */
class Report extends \yii\db\ActiveRecord
{
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_date', 'report_date', 'task_id', 'value'], 'required'],
            [['create_date', 'report_date'], 'safe'],
            [['task_id'], 'integer'],
            [['value'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'create_date' => Yii::t('app', 'Create Date'),
            'report_date' => Yii::t('app', 'Report Date'),
            'task_id' => Yii::t('app', 'Task ID'),
            'value' => Yii::t('app', 'Value'),
        ];
    }
    
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }
    
    public function setTask($value){
        $this->task = $value;
    }
}
