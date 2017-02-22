<?php
namespace DockerLAMP\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Stop extends DockerLampCommand
{
    protected function configure()
    {
        $this->setName('lamp-stop');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        exec( "docker stop {$this->getConfig('APP_CONTAINER_NAME')}" );
        exec( "docker stop {$this->getConfig('DB_CONTAINER_NAME')}" );
    }
}