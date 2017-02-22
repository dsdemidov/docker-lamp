<?php
namespace DockerLAMP\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MysqlDump extends DockerLampCommand
{
    protected function configure()
    {
        $this->setName('lamp-mysqldump');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $date = date("Y-m-d-His");
        $mysqlDumpDirectory = $this->getConfig('APP_ROOT_PATH') . $this->getConfig('MYSQLDUMP_PATH');
        if( !is_dir( $mysqlDumpDirectory ) ) {
            mkdir( $mysqlDumpDirectory );
        }

        exec( "docker exec {$this->getConfig('DB_CONTAINER_NAME')} sh -c \\
            'exec mysqldump -uroot -p\"{$this->getConfig('MYSQL_ROOT_PASSWORD')}\" {$this->getConfig('MYSQL_DATABASE_NAME')}' \\
            > {$mysqlDumpDirectory}/{$date}-{$this->getConfig('MYSQL_DATABASE_NAME')}.sql" );
    }
}