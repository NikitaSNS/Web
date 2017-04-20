<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 02.04.2017
 * Time: 21:40
 */
class FormField
{
    private $fieldName;
    private $pattern;
    private $error;
    private $required;

    /**
     * FormField constructor.
     * @param $fieldName
     * @param $pattern
     * @param $error
     * @param bool $required
     */
    public function __construct($fieldName, $pattern, $error, $required = true)
    {
        $this->fieldName = $fieldName;
        $this->pattern = $pattern;
        $this->error = $error;
        $this->required = $required;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     */
    public function setRequired(bool $required)
    {
        $this->required = $required;
    }

    /**
     * @return mixed
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * @param mixed $fieldName
     * @return FormField
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param mixed $pattern
     * @return FormField
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     * @return FormField
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }
}