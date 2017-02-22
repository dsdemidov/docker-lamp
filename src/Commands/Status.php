<?php
namespace DockerLAMP\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Status extends DockerLampCommand
{
    protected function configure()
    {
        $this->setName('lamp-ps');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo shell_exec( "docker ps -a" );
    }
}