<?php
namespace DockerLAMP;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginInterface;

/**
 * Docker LAMP is the docker based Linux-Apache-Mysql-PHP environment for developing simple PHP applications
 *
 * Class DockerLAMP
 * @package DockerLAMP
 */
class DockerLAMP implements PluginInterface, Capable  {
    /**
     * @var array
     */
    protected $config;

    /**
     * Return plugin configuration
     *
     * @return array
     */
    public function getConfig() {
        return $this->config;
    }

    /**
     * Set config parameter
     *
     * @param $key
     * @param $value
     */
    public function setConfigParam($key, $value) {
        if( $key && $value !== null ) {
            $this->config[$key] = $value;
        }
    }

    public function activate(Composer $composer, IOInterface $io) {
        // Config Defaults
        $this->config = array(
            // Mysql root password
            'MYSQL_ROOT_PASSWORD'=>'wordpress',
            // Mysql db name
            'MYSQL_DATABASE_NAME'=>'wordpress',
            // Exposed Apache Port
            'EXPOSED_WEB_PORT'=>80,
            // Directory for dropping mysql dumps in
            'MYSQLDUMP_PATH'=>"/mysql-dumps",
            // PHP Apache container name
            'APP_CONTAINER_NAME'=>"app",
            // Mysql container name
            'DB_CONTAINER_NAME'=>"db",
            // PHP_APP Image name
            'APP_IMAGE_NAME'=>"docker-app",
            // Apache public web folder
            'WEB_ROOT_PATH'=>"/public_html",
            // Project root path
            'APP_ROOT_PATH'=>dirname( $composer->getConfig()->get('vendor-dir') ),
            'PLUGIN_ROOT_PATH'=>dirname( dirname(__FILE__) ),
        );
    }

    public function getCapabilities() {
        return array(
            'Composer\Plugin\Capability\CommandProvider' => 'DockerLAMP\CommandProvider',
        );
    }
}