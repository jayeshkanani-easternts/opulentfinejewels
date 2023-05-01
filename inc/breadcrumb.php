<?php
/**
 *
 * @Create Breadcrumbs Trail.
 *
 * @copyright Copyright (C) 2008 PHPRO.ORG. All rights reserved.
 *
 * @version //autogentag//
 *
 * @license new bsd http://www.opensource.org/licenses/bsd-license.php
 *
 * @filesource
 *
 * @package Breadcrumbs
 *
 * @Author Kevin Waterson
 *
 */

class breadcrumbs{

    /*
     * @string $breadcrumbs
     */
    public $breadcrumbs;

    /*
     * @string $pointer
     */
    private $pointer = '&raquo;';

    /*
     * @string $url
     */
    private $url;

    /*
     * @array $parts
     */
    private $parts;


    /*
     * @constructor - duh
     *
     * @access public
     *
     */
    public function __construct()
    {
        $this->setParts();
        $this->setURL();
        $this->breadcrumbs = '<a href="'.$this->url.'">Home</a>';
    }


    /*
     *
     * @set the base url
     *
     * @access private
     *
     */
    private function setURL()
    {
        //$protocol = $_SERVER["SERVER_PROTOCOL"]=='HTTP/1.1' ? 'http' : 'https';
        $this->url = HTTP_SERVER.WS_ROOT;
    }


    /*
     * @set the pointer 
     *
     * @access public
     *
     * @param string $pointer
     * 
     */
    public function setPointer($pointer)
    {
        $this->pointer = $pointer;
    }


    /**
     *
     * @set the path array
     *
     * @access private
     *
     * @return array
     *
     */
    private function setParts()
    {
		echo $_SERVER['PHP_SELF'];
        $parts = explode('/', $_SERVER['REQUEST_URI']);
		print_r($parts);
        array_pop($parts);
        array_shift($parts);
		$this->parts = $parts;
		print_r($this->parts);
    }


    /**
     *
     * @create the breadcrumbs
     *
     * @access public
     *
      */
    public function crumbs()
    {
        foreach($this->parts as $part)
        {
            $this->url .= "/$part";
            $this->breadcrumbs .= " $this->pointer ".'<a href="'.$this->url.'">'.$part.'</a>';
        }
    }

} /*** end of class ***/

?>