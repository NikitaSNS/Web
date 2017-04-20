<?php


class FormValidator
{
    public static function validate($formData)
    {
        $fields = self::getRequiredFields();

        $fields[] = new FormField('password', '(^(?!.*[А-Яа-яЁё])(?=(?:.*[A-Z]){1})(?=(?:.*[^A-Za-z0-9]){2}).{5,13})',
            'Введите правильный пароль', false);


        $validData = [];

        foreach ($fields as $field) {
            if (!isset($formData[$field->getFieldName()]) || empty($formData[$field->getFieldName()])) {

                if (!$field->isRequired()) {
                    continue;
                }

                return ['error' => $error = $field->getError()];
            }

            if (!preg_match('/^(' . $field->getPattern() . ')$/', $formData[$field->getFieldName()])) {
                return ['error' => $error = $field->getError()];
            }

            $validData[$field->getFieldName()] = $formData[$field->getFieldName()];
        }

        return $validData;
    }

    /**
     * @return FormField[]
     */
    public static function getRequiredFields()
    {
        return [
            new FormField('first_name', '[A-Za-zА-Яа-яЁё]{2,10}', 'Введите правильное имя'),
            new FormField('last_name', '[A-Za-zА-Яа-яЁё]{2,14}', 'Введите правильную фамилию'),
            new FormField('gender', '\w+', 'Введите правильный пол'),
            new FormField('age', '0?[1-9]|[1-9][0-9]', 'Введите правильный возраст'),
            new FormField('date_of_birth', '(1899|19[0-9]{2}|200[0-9])-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])',
                'Введите правильную дату рождения'),
            new FormField('phone', '((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}',
                'Введите правильный номер телефона'),
            new FormField('login', '\w{3,10}', 'Введите правильный логин'),
            new FormField('password_sms', '\w{5}', 'Введите правильный пароль смс'),
        ];
    }

//    /**
//     * @param FormField[] $fields
//     * @param array $formData
//     * @return bool
//     */
//    public static function isValidFields(array $fields, array $formData)
//    {
//        foreach ($fields as $field) {
//            if (!isset($formData[$field->getFieldName()]) || $formData) {
//                return $field->getError();
//            }
//        }
//
//        return true;
//    }
}