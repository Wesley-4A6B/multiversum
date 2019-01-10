<?php

class afmeldenModel {

    public function afmelden()
    {
        /**
         * Destroys all sessions (Login session)
         */

        //Starts the session, just to make sure
        session_start();

        //Destroys all sessions
        session_destroy();

        //Header to the home page
        header('Location: /home');
        exit();
    }

}