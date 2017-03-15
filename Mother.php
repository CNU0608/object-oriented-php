<?php

    /**
     * Created by PhpStorm.
     * User: Undefined
     * Date: 2017/3/14
     * Time: 13:36
     */
    class Mother
    {
        protected function getEyesList()
        {
            return 2;
        }
    }
    class Child extends Mother{
        public function getEles()
        {
            return $this->getEyesList();
        }
    }
    $child = new Child();
    var_dump($child->getEles());