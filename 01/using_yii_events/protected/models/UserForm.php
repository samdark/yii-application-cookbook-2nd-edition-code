<?php
class UserForm extends CFormModel
{
    public $firstName;
    public $lastName;
    public $fullName;

    public function rules()
    {
        return array(
            // First name and last name are required
            array('firstName, lastName', 'required'),
        );
    }

    // $event argument here is CEvent instance that
    // was created passed when an event method was called.
    // This time it was happened inside of
    // CModel::afterValidate().
    function afterValidate()
    {
        // If this method was called then
        // the model is already filled
        // with data and data is valid
        // so we can use it safely:
        $this->fullName = $this->firstName.' '.$this->lastName;

        // It's important to call parent class method
        // so all other event handlers are called
        return parent::afterValidate();
    }
}
