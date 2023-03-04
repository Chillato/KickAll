<?php

namespace Chillato\Command;

use Chillato\Kick;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;

class KickCommand extends Command {

    public function __construct(Kick $kick)
    {
        $this->plugin = $kick;
        parent::__construct("kickall", "Kick players", "/kick <reason>");
        $this->setPermission("kick.use");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if(!$sender->hasPermission($this->getPermission())){
            $sender->sendMessage(Kick::$prefix . "§cYou not have this permission");
        } else {
            foreach(Server::getInstance()->getOnlinePlayers() as $player){
                $player->kick(Kick::$prefix. "§gYou kicked by {$sender->getName()}", false);
            }
            $sender->sendMessage(Kick::$prefix . "§aI kicked all players in the server");
        }
    }
}