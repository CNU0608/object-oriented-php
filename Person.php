<?php

    /**
     * Created by PhpStorm.
     * User: Undefined
     * Date: 2017/3/14
     * Time: 10:30
     */
    class Person
    {
        private $name;
        private $age;
        public function __construct()
        {
//            $this->name = 'CNU';
//            $this->age = 20;
        }

        public function setName($name)
        {
            $this->name = $name;
        }
        public function setAge($age)
        {
            if($age < 18){
                throw new Exception('on old enough');
            }
            $this->age = $age;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @return mixed
         */
        public function getAge()
        {
            return $this->age;
        }
    }
    $pers = new Person();
    $pers->setName('CNU');
    $pers->setAge(23);
//    var_dump($pers);
    var_dump($pers->getAge());