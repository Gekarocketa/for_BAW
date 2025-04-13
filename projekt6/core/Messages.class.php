<?php
namespace core;

class Messages {
    public $messages = array();
    public function addMessage($msg) {
        $this->messages[] = $msg;
    }

    public function addInfo($msg) {
        $this->messages[] = $msg;
    }

    public function addError($msg) {
        $this->messages[] = $msg;
    }

    public function isError() {
        return !empty($this->messages);
    }
}
?>
