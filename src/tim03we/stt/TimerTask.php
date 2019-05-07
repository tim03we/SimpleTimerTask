<?php

/*
 * Copyright (c) 2019 tim03we  < https://github.com/tim03we >
 * Discord: tim03we | TP#9129
 *
 * This software is distributed under "GNU General Public License v3.0".
 * This license allows you to use it and/or modify it but you are not at
 * all allowed to sell this plugin at any cost. If found doing so the
 * necessary action required would be taken.
 *
 * SimpleTimerTask is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License v3.0 for more details.
 *
 * You should have received a copy of the GNU General Public License v3.0
 * along with this program. If not, see
 * <https://opensource.org/licenses/GPL-3.0>.
 */

namespace tim03we\stt;

use pocketmine\scheduler\Task;
use pocketmine\utils\Config;

class TimerTask extends Task {

    public function __construct(\tim03we\stt\SimpleTimerTask $plugin){
        $this->plugin = $plugin;
        $this->stop = false;
        $config = new Config($this->plugin->getDataFolder() . "settings.yml", Config::YAML);
        $this->second = $config->get("start-time");
    }

    public function stop(){
        $this->stop = true;
    }

    public function onRun(int $currentTick) : void {
        $config = new Config($this->plugin->getDataFolder() . "settings.yml", Config::YAML);
        $this->second--;
        $format = $config->getNested("messages.remaining-time");
        $format = str_replace("{time-format}", $this->plugin->convertSeconds($this->second), $format);
        if($this->second === 0) {
            $this->plugin->getServer()->broadcastMessage($config->getNested("messages.end"));
            $this->stop();
        } else if(in_array($this->second, $config->get("countdown"))) {
            $this->plugin->getServer()->broadcastMessage($format);
        }
    }
}