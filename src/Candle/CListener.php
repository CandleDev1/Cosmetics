<?php

namespace Candle;

use pocketmine\entity\Skin;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class CListener implements Listener
{

    public function onPlayerJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();

        $oldSkin = $player->getSkin();
        $setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), "", $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
        $player->setSkin($setCape);
        $player->sendSkin();
    }

}