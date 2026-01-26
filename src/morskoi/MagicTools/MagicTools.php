<?php

namespace morskoi\MagicTools;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use morskoi\MagicTools\commands\MagicToolsCommand;
use morskoi\MagicTools\event\EventListener;

class MagicTools extends PluginBase
{
    private Config $cfg;
    public function onEnable(): void 
    {
        $this->saveResource("config.yml");
        $this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        $lang = $this->getConfig()->get("lang", "ru_RUS");
        
        $this->saveResource("languages/" . $lang . ".yml");
        
        $this->lang = new Config($this->getDataFolder() . "languages/" . $lang . ".yml", Config::YAML);

        $this->getServer()->getCommandMap()->register("magictools", new MagicToolsCommand($this));

        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    }
    public function getConfig(): Config 
    {
        return $this->cfg;
    }
    public function lang(string $key): string 
    {
        return $this->lang->get($key, "lang: $key");
    }
}