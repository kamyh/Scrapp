<?php
/**
 * Created by PhpStorm.
 * User: derua_000
 * Date: 19.12.2014
 * Time: 12:03
 */

class Div
{
    public function __construct($class_,$id,$value,$style,$depth)
    {
        $this->class_ = $class_;
        $this->id = $id;
        $this->value = $value;
        $this->style = $style;
        $this->depth = $depth;
    }

    public function toString()
    {
        //</div> needed to be add after this fct call
        $str = '<div ';

        $str .= 'class="'.$this->class_.'" ';
        $str .= 'id="'.$this->id.'" ';
        $str .= 'value="'.$this->value.'" ';
        $str .= 'style="'.$this->style.'">';

        return $str;
    }

    public function getDepth()
    {
        return $this->depth;
    }

    /* Getters and Setters*/

    /*Atributs*/

    private $class_ = '';
    private $id = '';
    private $value = '';
    private $style = '';
    private $depth = 1;

} 