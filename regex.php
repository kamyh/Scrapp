<?php
/**
 * Created by PhpStorm.
 * User: derua_000
 * Date: 19.12.2014
 * Time: 11:00
 */

class regex {

    public function __construct()
    {

    }

    public function isOneDivLvlOne($str)
    {
        $txt='/html/body/div';

        $re1='(\\/)';	# Any Single Character 1
        $re2='(html)';	# Word 1
        $re3='(\\/)';	# Any Single Character 2
        $re4='(body)';	# Word 2
        $re5='(\\/)';	# Any Single Character 3
        $re6='(div)$';	# Word 3

        if ($c=preg_match_all ("/".$re1.$re2.$re3.$re4.$re5.$re6."/is", $str, $matches))
        {
            return True;
        }

        return False;
    }

    public static function isIntersect($str)
    {
        $txt='intersect8';

        $re1='(intersect)';	# Word 1
        $re2='(\\d+)';	# Integer Number 1

        if ($c=preg_match_all ("/".$re1.$re2."/is", $str, $matches))
        {
            return true;
        }

        return false;
    }

    public function isOneDivLvlOneWithHook($str)
    {
        $txt='/html/body/div[8]';

        $re1='(\\/)';	# Any Single Character 1
        $re2='(html)';	# Word 1
        $re3='(\\/)';	# Any Single Character 2
        $re4='(body)';	# Word 2
        $re5='(\\/)';	# Any Single Character 3
        $re6='(div)';	# Word 3
        $re7='(\\[)';	# Any Single Character 4
        $re8='(\\d+)';	# Integer Number 1
        $re9='(\\])$';	# Any Single Character 5

        if ($c=preg_match_all ("/".$re1.$re2.$re3.$re4.$re5.$re6.$re7.$re8.$re9."/is", $str, $matches))
        {
            return True;
        }

        return False;
    }

} 