<?php

    /**
     * Created by PhpStorm.
     * User: Undefined
     * Date: 2017/3/14
     * Time: 14:01
     */
    abstract class shape
    {

        /**
         * shape constructor.
         */
        public function __construct()
        {
            echo $this->name = 'shapes';
        }

        abstract public function Per();
    }
    class square extends shape
    {
        public function Per()
        {
            $length = 4;
            echo pow($length, 2);
        }
    }
    class round extends  shape
    {
        public function Per()
        {
            echo '111';
        }
    }
    $round = new round();
    echo $round->per();