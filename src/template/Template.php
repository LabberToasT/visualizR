<?php

namespace template;

use Exception;

/**
 * Class to store a page to display and globally accessible parameters for the page
 */
class Template
{
    /**
     * Variable that holds the path information
     *
     * @var $data array
     */
    protected $data;
    
    /**
     * Variable that stores global variables accessible on the html page
     *
     * @var $variables array
     */
    protected $variables;
    
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
     * Method to store a parameter for access on the html page
     *
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        $this->data[$name] = $value;
    }
    
    /**
     * Method to retrieve stored parameters
     *
     * @param $name string
     *
     * @return mixed
     * @throws Exception
     */
    public function get($name)
    {
        //check if requested parameter is available
        if (isset($this->data[$name])) {
            
            return $this->data[$name];
        }
        
        //throw exception if requested parameter cannot be found
        throw new \Exception($name . ' is not set');
    }
    
    /**
     * Method that displays the user specified page
     *
     * @return string
     */
    public function render()
    {
        ob_start();
        include $this->data['path'];
        
        return ob_get_clean();
    }
}
