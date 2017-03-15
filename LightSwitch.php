<?php

    /**
     * Created by PhpStorm.
     * User: Undefined
     * Date: 2017/3/14
     * Time: 11:40
     */
    class LightSwitch
    {
        public function on()
        {
            $this->content();
        }

        public function off()
        {
            
        }

        private function content()
        {
            var_dump('content');
        }
    }
    $lightSwitch = new LightSwitch();
    $lightSwitch->on();
    