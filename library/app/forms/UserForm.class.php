<?php

namespace app\forms;

use app\forms\FormElement;

class UserForm extends Form{
    public FormElement $id;
	public FormElement $email;
	public FormElement $pass;
    public FormElement $firstname;
    public FormElement $lastname;
    public FormElement $role;
}