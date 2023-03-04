<?php

namespace Chillato;

use Chillato\Command\KickCommand;
use pocketmine\plugin\PluginBase;

class Kick extends PluginBase {

    public static $prefix = "§7[§eKickAll§7] ";

    public function onEnable(): void
    {
        $this->getServer()->getCommandMap()->register("kickall", new KickCommand($this));
    }
}