<?php

    /**
     * Created by PhpStorm.
     * User: Undefined
     * Date: 2017/3/14
     * Time: 14:55
     */
    interface Logger
    {
        public function save($messger);
    }

    class FileLogger implements Logger
    {
        public function save($messger)
        {
            var_dump('log info file'.$messger);
        }
    }

    class DataBaseLogger implements Logger
    {
        public function save($messger)
        {
            var_dump('log info database'.$messger);
        }
    }
    
    class UserController
    {
        /**
         * UserController constructor.
         */
        public function __construct(Logger $logger)
        {
            $this->logger = $logger;
        }

        public function register()
        {
            $user = 'CNU';
            $this->logger->save($user);
        }
    }
    $usercon = new UserController(new DataBaseLogger());
    $usercon->register();
