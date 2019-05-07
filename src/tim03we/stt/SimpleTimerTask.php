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

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class SimpleTimerTask extends PluginBase {

    public function onEnable()
    {
        $this->saveResource("settings.yml");
        $this->config = new Config($this->getDataFolder() . "settings.yml", Config::YAML);
        $this->getScheduler()->scheduleRepeatingTask(new \tim03we\stt\TimerTask($this), 20);

    }

    public function convertSeconds(int $seconds) : string {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;
        $format = $this->config->get("time-format");
        $format = str_replace("{hours}", $hours, $format);
        $format = str_replace("{minutes}", $minutes, $format);
        $format = str_replace("{seconds}", $seconds, $format);
        return "$format";
    }
}