<?php

class Flash
{
    protected $messages;

    public function __construct()
    {
        $this->messages = array();
    }

    public function success($message)
    {
        $this->set_messages(MESSAGES_TYPE_SUCCESS, $message);

        return $this;
    }

    public function error($message)
    {
        $this->set_messages(MESSAGES_TYPE_ERROR, $message);

        return $this;
    }

    public function warning($message)
    {
        $this->set_messages(MESSAGES_TYPE_WARNING, $message);

        return $this;
    }

    public function set_messages($type, $message)
    {
        $messages = (is_array($message)) ? $message : array($message);

        $this->messages = array(
            "type"      => $type,
            "messages"  => $messages
        );

        return $this;
    }

    public function to_json()
    {
        return json_encode($this->messages);
    }

    public function to_array() {
        return $this->messages;
    }
}
