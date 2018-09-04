<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 12:02
 */

namespace App\Dto;


abstract class AbstractDto implements \JsonSerializable
{
    public function jsonSerialize()
    {
        $getter_names = get_class_methods(get_class($this));
        $gettable_attributes = array();
        foreach ($getter_names as $key => $value) {
            if (substr($value, 0, 4) === 'get_') {
                $gettable_attributes[substr($value, 4, strlen($value))]
                    = $this->$value();
            }
        }
        return $gettable_attributes;
    }
}