<?php
/**
 * Created by Nemogroup.
 * @author: Marcelo Agüero <marcelo.aguero@nemogroup.net>
 * @since: 17/07/13 09:33
 */

class Dump
{

    static protected function parse($var, $indent=5, $niv=0, &$str = '', $name = ''){

        $margin_left = $indent * ($niv++) ."px";
        $str .= "<div class='g' style='margin: 2px {$margin_left};'>";
        $margin_left = $indent * ($niv + 1) ."px";

        if(is_array($var)) {

            $str.= "&nbsp;'{$name}' => <br/><div class='a' style='display: inline-block; margin: 2px {$margin_left};'><b>array</b> (<i>size=".count($var)."</i>)<br />";
            foreach($var as $k => $v) {
                self::parse($v, $indent, $niv+1, $str, $k);
            }
            $str .= "</div>";
        } else if(is_object($var)) {


            $str.= "&nbsp;'{$name}' => <br/><div class='o' style='display: inline-block; margin: 2px {$margin_left};'><b>object</b> (".get_class($var).")<br />";

            $arr = get_object_vars($var);
            foreach($arr as $k => $method){
                self::parse($method, $indent, $niv+1, $str, $k);
            }

            $str .= "</div>";

        } else if(!is_string($var) && is_callable($var)) {

        } else {
            $color = (gettype($var) == 'string') ? 'red' : 'green';
            $c = (gettype($var) == 'string') ? "'" : '';
            $str .= "<div class='e' style='padding: 2px;'><span>'{$name}'</span> => <span>(".gettype($var).")</span>&nbsp; <span style='color: {$color}'>{$c}{$var}{$c}</span></div>";
        }

        $str .= "</div>";
        return $str;
    }

    static public function debug($var, $label = "var"){
        $str = '<div style="background: #B6F9F6; font-size: 0.8em; padding: 5px;">';
            self::parse($var, 5, 0, $str, $label);
        $str .= '</div>';
        print $str;
    }
}

?>
