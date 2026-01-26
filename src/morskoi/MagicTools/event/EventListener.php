<?php

namespace morskoi\MagicTools\event;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\ItemTypeIds;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use morskoi\MagicTools\MagicTools;
use pocketmine\block\VanillaBlocks;
use pocketmine\item\VanillaItems;

class EventListener implements Listener
{
    private MagicTools $plugin;
    private array $cooldowns = [];
    public function __construct(MagicTools $plugin)
    {
        $this->plugin = $plugin;
    }
    public function MagicSword(EntityDamageByEntityEvent $e)
    {
        $d = $e->getDamager();
        $ent = $e->getEntity();

        if ($d instanceof Player && $ent instanceof Player)
            {
                $item = $d->getInventory()->getItemInHand();
                $nametag = $item->getNamedTag()->getTag("magicsword");
                if ($item->getTypeId() === ItemTypeIds::NETHERITE_SWORD && $nametag !== null) 
                    {
                        $chance = mt_rand(1, 100);
                        if ($chance <= 25)
                            {
                                $ent->getEffects()->add(new EffectInstance(VanillaEffects::WITHER(), 20 * 5, 0));
                            }
                            if ($chance <= 5)
                                {
                                    $ent->setHealth($ent->getHealth() - 2);
                                    $d->getEffects()->add(new EffectInstance(VanillaEffects::REGENERATION(), 20 * 3, 1));
                                }
                    }
            }
    }
    public function MagicPickaxe(BlockBreakEvent $e)
    {
        $p = $e->getPlayer();
        $item = $e->getItem();
        $nametag = $item->getNamedTag()->getTag("magicpickaxe");
        $b = $e->getBlock();
        if ($item->getTypeId() === ItemTypeIds::NETHERITE_PICKAXE && $nametag !== null)
            {
                $chance = mt_rand(1, 100);
                if ($chance <= 16)
                    {
                        if ($b->getTypeId() === VanillaBlocks::ANCIENT_DEBRIS()->getTypeId())
                            {
                                $e->setDrops([VanillaItems::NETHERITE_SCRAP()]);
                            }
                            if ($b->getTypeId() === VanillaBlocks::GOLD_ORE()->getTypeId())
                                {
                                    $e->setDrops([VanillaItems::GOLD_INGOT()]);
                                }
                                if ($b->getTypeId() === VanillaBlocks::IRON_ORE()->getTypeId())
                                    {
                                        $e->setDrops([VanillaItems::IRON_INGOT()]);
                                    }
                    }
            }
    }
    public function MagicAxe(BlockBreakEvent $e)
    {
        $p = $e->getPlayer();
        $item = $e->getItem();
        $nametag = $item->getNamedTag()->getTag("magicaxe");
        $b = $e->getBlock();
        if ($item->getTypeId() === ItemTypeIds::NETHERITE_AXE && $nametag !== null)
            {
                $chance = mt_rand(1, 100);
                if ($b->getTypeId() === VanillaBlocks::OAK_LOG()->getTypeId())
                    {
                        if ($chance <= 5)
                            {
                                $e->setDrops([VanillaBlocks::OAK_LOG()->asItem()->setCount(2)]);
                            }
                    }
                    if ($b->getTypeId() === VanillaBlocks::SPRUCE_LOG()->getTypeId())
                        {

                            if ($chance <= 5)
                                {
                                    $e->setDrops([VanillaBlocks::SPRUCE_LOG()->asItem()->setCount(2)]);
                                }
                        }
                        if ($b->getTypeId() === VanillaBlocks::BIRCH_LOG()->getTypeId())
                            {
    
                                if ($chance <= 5)
                                    {
                                        $e->setDrops([VanillaBlocks::BIRCH_LOG()->asItem()->setCount(2)]);
                                    }
                            }
                            if ($b->getTypeId() === VanillaBlocks::JUNGLE_LOG()->getTypeId())
                                {
        
                                    if ($chance <= 5)
                                        {
                                            $e->setDrops([VanillaBlocks::JUNGLE_LOG()->asItem()->setCount(2)]);
                                        }
                                }
                                if ($b->getTypeId() === VanillaBlocks::ACACIA_LOG()->getTypeId())
                                    {
            
                                        if ($chance <= 5)
                                            {
                                                $e->setDrops([VanillaBlocks::ACACIA_LOG()->asItem()->setCount(2)]);
                                            }
                                    }
                                    if ($b->getTypeId() === VanillaBlocks::DARK_OAK_LOG()->getTypeId())
                                         {
                
                                            if ($chance <= 5)
                                                {
                                                    $e->setDrops([VanillaBlocks::DARK_OAK_LOG()->asItem()->setCount(2)]);
                                                }
                                         }
                                        if ($b->getTypeId() === VanillaBlocks::MANGROVE_LOG()->getTypeId())
                                            {
                    
                                                if ($chance <= 5)
                                                    {
                                                        $e->setDrops([VanillaBlocks::MANGROVE_LOG()->asItem()->setCount(2)]);
                                                    }
                                            }
                                            if ($b->getTypeId() === VanillaBlocks::CHERRY_LOG()->getTypeId())
                                                {
                        
                                                    if ($chance <= 5)
                                                        {
                                                            $e->setDrops([VanillaBlocks::CHERRY_LOG()->asItem()->setCount(2)]);
                                                        }
                                                }
            }
    }
    public function MagicShovel(BlockBreakEvent $e)
    {
        $p = $e->getPlayer();
        $item = $e->getItem();
        $nametag = $item->getNamedTag()->getTag("magicshovel");
        $b = $e->getBlock();
        if ($item->getTypeId() === ItemTypeIds::NETHERITE_SHOVEL && $nametag !== null)
            {
                if ($b->getTypeId() === VanillaBlocks::SAND()->getTypeId())
                    {
                        $chance = mt_rand(1, 100);
                        $items = [
                            VanillaItems::DIAMOND(),
                            VanillaBlocks::GLASS()->asItem(),
                            VanillaItems::GOLD_NUGGET(),
                            VanillaItems::APPLE(),
                        ];

                        $randomItem = $items[array_rand($items)];
                        if ($chance <= 15)
                            {
                                $e->setDrops([$randomItem]);
                            }
                    }
            }
    }
}