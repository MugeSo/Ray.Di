<?php

namespace MovieApp {
    class Lister {
        public $dbFinder;
        public function __construct(DbFinder $dbFinder){
            $this->dbFinder = $dbFinder;
        }
    }
    class DbFinder {
        public $username, $password = null;
        public function setCredentials($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }
    }
}

namespace {
    $di = include __DIR__ . '/scripts/instance.php';
    $di->getContainer()->params['MovieApp\DbFinder'] = array(
            'username' => 'my-username',
            'password' => 'my-password'
    );
    $lister = $di->getInstance('MovieApp\Lister');

    // expression to test
    $works = (
        $lister->dbFinder instanceof MovieApp\DbFinder
        && $lister->dbFinder->username == 'my-username'
        && $lister->dbFinder->password == 'my-password'
    );

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!');
}
