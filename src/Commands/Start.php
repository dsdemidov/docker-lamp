<?php
namespace DockerLAMP\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Start extends DockerLampCommand
{
    protected function configure()
    {
        $this->setName('lamp-start');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dockerFilePath = $this->getConfig('PLUGIN_ROOT_PATH') . '/docker/app.dockerfile';
        exec("docker build -t {$this->getConfig('APP_IMAGE_NAME')} -f {$dockerFilePath} {$this->getConfig('PLUGIN_ROOT_PATH')}");

        exec("docker run -d --rm --name {$this->getConfig('DB_CONTAINER_NAME')} \\
            -v {$this->getConfig('APP_ROOT_PATH')}/docker-db-entrypoint:/docker-entrypoint-initdb.d \\
            -v {$this->getConfig('APP_ROOT_PATH')}/mysql:/var/lib/mysql \\
            -v {$this->getConfig('APP_ROOT_PATH')}/config/mysql:/etc/mysql/conf.d \\
            -e MYSQL_ROOT_PASSWORD={$this->getConfig( 'MYSQL_ROOT_PASSWORD' )} \\
            -e MYSQL_DATABASE={$this->getConfig( 'MYSQL_DATABASE_NAME' )} \\
            mysql:latest");

        exec("docker run -d --rm -p {$this->getConfig( 'EXPOSED_WEB_PORT' )}:80 \\
            --name {$this->getConfig( 'APP_CONTAINER_NAME' )} \\
            --link {$this->getConfig( 'DB_CONTAINER_NAME' )}:{$this->getConfig( 'DB_CONTAINER_NAME' )} \\
            -v {$this->getConfig('APP_ROOT_PATH')}{$this->getConfig( 'WEB_ROOT_PATH' )}:/var/www/html \\
            {$this->getConfig( 'APP_IMAGE_NAME' )}");

    }
}