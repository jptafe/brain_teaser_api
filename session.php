<?php

class sessionManager {

    public function is_rate_limited () {
        return true;
    }

    public function is_corret_origin () {
        //HTTP_ORIGIN header
        return true;
    }

    public function sanatise_input ($value) {
        // do something to the value
    }

    public function validate_input ($type, $value) {
        return true;
    }

}

?>