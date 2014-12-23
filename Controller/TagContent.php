<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

require_once('TagTypes.php');
error_reporting(E_ERROR | E_PARSE);

class TagContent
{
    public function __construct($parser)
    {
        $this->parser = $parser;
    }

    public function build($tagType,$seekBy,$identifier)
    {
        $this->tagType = $tagType;
        $this->seekBy = $seekBy;
        $this->identifier = $identifier;
    }

    public function fetch()
    {
        $this->query = '//'.$this->tagType.'[@'.$this->seekBy.'="'.$this->identifier.'"]';
        $this->domNode = $this->parser->getXPath()->query($this->query)->item(0);
        $this->style = $this->domNode->getAttribute('style');
    }

    public function setStyle($style)
    {
        $this->style = $style;
    }

    public function getContent()
    {
        if($this->tagType == 'img')
        {
            return $this->domNode->getAttribute('src');
        }
        else if($this->tagType == 'span')
        {
            return $this->domNode->nodeValue;
        }
    }

    public function getContentWithTag()
    {
        if($this->tagType == 'img')
        {
            return '<img src="' . $this->domNode->getAttribute('src') . '" style="' . $this->style . '"/>';
        }
        else if($this->tagType == 'span')
        {

            return '<span style="' . $this->style . '">'.$this->domNode->nodeValue.'</span>';
        }

        return 'ERROR';
    }


    /*
     * Attributes
     */

    private $xpath;
    private $url;
    private $tagType;
    private $seekBy;
    private $identifier;
    private $query;
    protected $domNode;
    protected $style;
    protected $parser;
}