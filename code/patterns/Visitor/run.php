<?php

require_once("../../vendor/autoload.php");

use patterns\Visitor\composite\Army;
use patterns\Visitor\unit\Archer;
use patterns\Visitor\unit\Cavalry;
use patterns\Visitor\unit\LaserCannonUnit;
use patterns\Visitor\visitor\TextDumpArmyVisitor;
use patterns\Visitor\visitor\TaxCollectionVisitor;

$main_army = new Army();
$main_army->addUnit(new Archer()) ;
$main_army->addUnit(new LaserCannonUnit());
$main_army->addUnit(new Cavalry());

$textdump = new TextDumpArmyVisitor();
$main_army->accept($textdump);

print $textdump->getText();

print PHP_EOL;

$main_army = new Army();
$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCannonUnit());
$main_army->addUnit(new Cavalry());

$taxcollector = new TaxCollectionVisitor();
$main_army->accept($taxcollector);

print $taxcollector->getReport();
print 'ИТОГО: ';
print $taxcollector->getTax() . "\n";
