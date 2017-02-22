<?php
namespace DockerLAMP\Commands;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DockerLampCommand extends BaseCommand
{
    protected $config;

    public function __construct($name, $config)
    {
        parent::__construct($name);
        $this->config = $config;
    }

    /**
     * Return config by key of full if key === false
     *
     * @param $key
     * @return mixed
     */
    public function getConfig( $key ) {
        if ( $key === false ) {
            return $this->config;
        }
        return $this->config[$key];
    }

    protected function configure() {
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
    }
}