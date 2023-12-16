<?php

namespace Candle;

use Candle\Commands\CosmeticCommand;
use Exception;
use JsonException;
use pocketmine\entity\Skin;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase {

    public function onEnable(): void
    {
        $this->getLogger()->info('Cosmetics System has been enabled');

        $this->getServer()->getPluginManager()->registerEvents(new CListener(), $this);
        $this->getServer()->getCommandMap()->register('CosmeticCommand', new CosmeticCommand($this));

        @mkdir($this->getDataFolder() . "/capes");
    }

    public function onDisable(): void
    {
        $this->getLogger()->info('Cosmetics System has been disabled');
    }


    /**
     * @param Player $player
     * @param string $cape
     * @throws JsonException
     * @throws Exception
     */
    public function setCage(Player $player, string $cape): void
    {
        $player->sendMessage(TextFormat::AQUA . "You've set your cape to " . TextFormat::WHITE . $cape . TextFormat::AQUA . " cape.");
        $oldSkin = $player->getSkin();
        $capeData = $this->generateCapeData($cape);
        $setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
        $player->setSkin($setCape);
        $player->sendSkin();
    }

    /**
     * @throws Exception
     */
    public function generateCapeData(string $name): string
    {
        $path = $this->getDataFolder() . "capes/". $name . ".png";
        if (!file_exists($path) || !is_file($path)) {
            throw new Exception("Invalid file: " . $path);
        }
        $img = @imagecreatefrompng($path);
        if (!$img) {
            throw new Exception("Failed to create image resource from: " . $path);
        }
        $bytes = '';
        $l = (int)@getimagesize($path)[1];
        for ($y = 0; $y < $l; $y++) {
            for ($x = 0; $x < 64; $x++) {
                $rgba = @imagecolorat($img, $x, $y);
                $a = ((~((int)($rgba >> 24))) << 1) & 0xff;
                $r = ($rgba >> 16) & 0xff;
                $g = ($rgba >> 8) & 0xff;
                $b = $rgba & 0xff;
                $bytes .= chr($r) . chr($g) . chr($b) . chr($a);
            }
        }
        @imagedestroy($img);
        return $bytes;
    }
}