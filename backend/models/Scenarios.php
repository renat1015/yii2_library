<?php

namespace backend\models;

use yii\base\Model;

trait Scenarios {
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
}
