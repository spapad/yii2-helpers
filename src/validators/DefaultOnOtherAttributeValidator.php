<?php
namespace spapad\yii2helpers\validators;

use yii\validators\Validator;

/**
 * DefaultOnOtherAttributeValidator
 * If the value of the attribute is a certain one ([if])
 * sets a default value [otherAttributeValue] on another attibute named
 * [otherAttribute], if that attribute does not have a value.
 *
 * [el] Θέτει την τιμή της ιδιότητας [otherAttribute] στην τιμή
 * [otherAttributeValue] εφόσον η τιμή της είναι κενή και
 * η τιμή της ιδιότητας υπό εξέταση είναι ίση με την τιμή [if]
 *
 * @author Stavros Papadakis spapad@gmail.com
 */
class DefaultOnOtherAttributeValidator extends Validator
{
    public $if;
    public $otherAttributeValue;
    public $otherAttribute;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function validateAttribute($model, $attribute)
    {
        if ($this->if === null) {
            $this->addError($model, $attribute, Yii::t('app', '{attribute} is missing required "if" parameter.'));
        }
        if ($this->otherAttribute === null) {
            $this->addError($model, $attribute, Yii::t('app', '{attribute} is missing required "otherAttribute" parameter.'));
        }
        if ($this->otherAttributeValue === null) {
            $this->addError($model, $attribute, Yii::t('app', '{attribute} is missing required "otherAttributeValue" parameter.'));
        }
        if (($this->if === null) ||
            ($this->otherAttribute === null) ||
            ($this->otherAttributeValue === null)) {
            return;
        }

        $other_attribute = $this->otherAttribute;
        if ($model->$attribute == $this->if) { // when criteria is met
            if (!isset($model->$other_attribute) || empty($model->$other_attribute)) {
                $model->$other_attribute = $this->otherAttributeValue;
            }
        }
    }
}
