<?php

declare(strict_types=1);

namespace NhanAZ\GuardianJoin;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use pocketmine\network\mcpe\protocol\types\LevelEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onJoin(PlayerJoinEvent $event): void {
		$player = $event->getPlayer();
		$packet = new LevelEventPacket();
		$packet->eventId = LevelEvent::GUARDIAN_CURSE;
		$packet->eventData = $player->getId();
		$packet->position = $player->getPosition();
		$player->getNetworkSession()->sendDataPacket($packet);
	}
}
