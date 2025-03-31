<?php
class Messages {
    public $messages = array();

    public function addMessage($msg) {
        $this->messages[] = $msg;
    }

    public function isError() {
        return !empty($this->messages);
    }
}
?>
