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
    public function __construct($path)
    {
        $this->data['path'] = $path;
    }

    /**
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name
     *
     * @return mixed
     * @throws Exception
     */
    public function get($name)
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
    public function render()
    {
        ob_start();
        include $this->data['path'];
        
        return ob_get_clean();
    }
}
