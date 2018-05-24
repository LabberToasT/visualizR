<?php

namespace template;

use Exception;

class Template
{
    protected $data;
    protected $name;

    /**
     * Template constructor.
     *
     * @param $path
     */
    function __construct($path)
    {
        $this->data['path'] = $path;
    }

    /**
     * @param $name
     * @param $value
     */
    function set($name, $value)
    {

        $this->data[$name] = $value;
    }

    /**
     * @param $name
     *
     * @return mixed
     * @throws Exception
     */
    function get($name)
    {
        if (isset($this->data[$name])) {

            return $this->data[$name];
        } else {

            throw new Exception($name . ' is not set');
        }
    }

    /**
     * @return string
     */
    function render()
    {

        ob_start();
        include($this->data['path']);
        $content = ob_get_clean();
        return $content;
    }
}
