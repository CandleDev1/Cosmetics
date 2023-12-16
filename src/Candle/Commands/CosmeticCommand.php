<?php

namespace Candle\Commands;

use Candle\Main;
use dktapps\pmforms\FormIcon;
use dktapps\pmforms\MenuForm;
use dktapps\pmforms\MenuOption;
use EasyUI\element\Button;
use EasyUI\icon\ButtonIcon;
use EasyUI\variant\SimpleForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class CosmeticCommand extends Command
{

    public function __construct(Private Main $main)
    {
        parent::__construct('cosmetic','','',['cape']);
        $this->setPermission('pocketmine.group.user');
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player)
        {
            $this->CreateCosmeticsForm($sender);
        }

    }

    private function CreateCosmeticsForm(Player $player)
    {
        $form = new SimpleForm('§l§9Cosmetics');
        $form->addButton(new Button('§bCapes', New ButtonIcon('https://github.com/ZtechNetwork/MCBVanillaResourcePack/blob/master/textures/items/carrot.png'), function (Player $player) {
            $this->CreateCapeForm($player);
        }));
        $player->sendForm($form);
    }

    private function CreateCapeForm(Player $player)
    {
        $form = new SimpleForm('§l§9Capes');
        $form->addButton(new Button('§bCreeper Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'Creeper');
            }
        }));
        $form->addButton(new Button('§bBears Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'Bears');
            }
        }));
        $form->addButton(new Button('§bBloom Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'Bloom');
            }
        }));
        $form->addButton(new Button('§bCalvin Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'Calvin');
            }
        }));
        $form->addButton(new Button('§bChicken Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'Chicken');
            }
        }));
        $form->addButton(new Button('§bElmo Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'Elmo');
            }
        }));
        $form->addButton(new Button('§bHeart Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'Heart');
            }
        }));
        $form->addButton(new Button('§bPoko Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'Poko');
            }
        }));
        $form->addButton(new Button('§bRKY Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'RKY');
            }
        }));
        $form->addButton(new Button('§bSammyGreen Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'SammyGreen');
            }
        }));
        $form->addButton(new Button('§bSpeedSilver Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'SpeedSilver');
            }
        }));
        $form->addButton(new Button('§bStipmy Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'Stipmy');
            }
        }));
        $form->addButton(new Button('§bWings Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'Wings');
            }
        }));
        $form->addButton(new Button('§bWisp Cape', null, function (Player $player){
            if($player->hasPermission('pocketmine.group.user')) {
                $this->main->setCage($player, 'Wisp');
            }
        }));
        $player->sendForm($form);
    }


}