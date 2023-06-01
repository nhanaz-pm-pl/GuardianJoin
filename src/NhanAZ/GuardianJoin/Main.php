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
		$player->getNetworkSession()->sendDataPacket(
			LevelEventPacket::create(
				eventId: LevelEvent::GUARDIAN_CURSE,
				eventData: 0,
				position: $player->getPosition()
			)
		);
	}
}
