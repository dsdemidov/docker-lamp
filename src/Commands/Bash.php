<?php
namespace DockerLAMP\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Bash extends DockerLampCommand
{
    protected function configure()
    {
        $this->setName('lamp-bash');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $VM_NAME = $this->getIO()->ask("What is container name, that you want to connect to? ");
        if( !$VM_NAME ) {
            $this->getIO()->write("Please provide the container name.");
        } else {
            $cmd = "docker exec -ti $VM_NAME bash";
            $fp = popen($cmd, "r");
            while(!feof($fp))
            {
                // send the current file part to the browser
                print fread($fp, 1024);
                // flush the content to the browser
                flush();
            }
            fclose($fp);
        }

    }
}