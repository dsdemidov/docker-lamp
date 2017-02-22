<?php
namespace DockerLAMP\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Restart extends DockerLampCommand
{
    protected function configure()
    {
        $this->setName('lamp-restart');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $lampStop = new Stop(null, $this->getConfig(false));
        $lampStart = new Start(null, $this->getConfig(false));

        $lampStop->execute($input,$output);
        $lampStart->execute($input,$output);
    }
}