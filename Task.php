<?php
    class Task {
        public $descript;
        public function __construct($descript){
            $this->descript = $descript;
        }
        public function computed(){
            var_dump('this is computedFn');
        }

    }
    $task = new Task('hi, jerry');
    $task->computed();
    var_dump($task->descript);