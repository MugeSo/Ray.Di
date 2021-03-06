<?php

namespace Ray\Di\Modules;

use Ray\Di\AbstractModule;

class InstallModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new BasicModule);
        $this->bind('Ray\Di\Mock\LogInterface')->to('Ray\Di\Mock\Log');
    }
}
