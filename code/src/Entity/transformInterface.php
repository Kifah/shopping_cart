<?php
/**
 * Created by PhpStorm.
 * User: kab
 * Date: 04.09.18
 * Time: 16:34
 */

namespace App\Entity;


interface transformInterface
{

    /**
     * responsible for transformaing an entity to a data transfer object
     */
    public function transformEntityToDto();

}