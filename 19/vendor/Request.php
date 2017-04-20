<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 19.04.2017
 * Time: 20:34
 */
class Request
{
    private $fields;
    private $files;
    private $method;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];

        if ($this->method === 'GET') {
            $this->fields = &$_GET;
        } else {
            if ($this->method === 'POST') {
                $this->fields = &$_POST;
            } else {
                $this->fields = [];
            }
        }

        if (!empty($_FILES)) {
            $this->files = &$_FILES;
        } else {
            $this->files = [];
        }
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    public function isHaveField(string $fieldName)
    {
        return isset($this->fields[$fieldName]);
    }

    public function checkFields(string $pattern)
    {
        $isFind = false;
        foreach ($this->fields as $field) {
            if (preg_match($pattern, $field)) {
                return ($isFind = true) ;
            }
        }

        return $isFind;
    }
}