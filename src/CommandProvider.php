<?php
namespace DockerLAMP;

use Composer\Plugin\Capability\CommandProvider as CommandProviderCapability;
use DockerLAMP\Commands\Bash;
use DockerLAMP\Commands\MysqlDump;
use DockerLAMP\Commands\Start;
use DockerLAMP\Commands\Restart;
use DockerLAMP\Commands\Stop;
use DockerLAMP\Commands\Status;

class CommandProvider implements CommandProviderCapability
{
    protected $pluginInstance;

    public function __construct( $ctorArgs ) {
        $this->pluginInstance = $ctorArgs['plugin'];
    }

    public function getCommands()
    {
        return array(
            new Start(null, $this->pluginInstance->getConfig()),
            new Stop(null, $this->pluginInstance->getConfig()),
            new Restart(null, $this->pluginInstance->getConfig()),
            new MysqlDump(null, $this->pluginInstance->getConfig()),
            new Bash(null, $this->pluginInstance->getConfig()),
            new Status(null, $this->pluginInstance->getConfig())
        );
    }

}