<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Circle]].
 *
 * @see Circle
 */
class CirclesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Circle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Circle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
