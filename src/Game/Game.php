<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;

use BinaryStudioAcademy\Game\GameService;

use BinaryStudioAcademy\Game\Resourses\ResourceFactory;
use BinaryStudioAcademy\Game\Resourses\CombinedResourseFactory;
 

use BinaryStudioAcademy\Game\Modules\Shell;
use BinaryStudioAcademy\Game\Modules\Porthole;
use BinaryStudioAcademy\Game\Modules\ControlUnit;
use BinaryStudioAcademy\Game\Modules\Wires;
use BinaryStudioAcademy\Game\Modules\Ic;
use BinaryStudioAcademy\Game\Modules\Engine;
use BinaryStudioAcademy\Game\Modules\Launcher;
use BinaryStudioAcademy\Game\Modules\Tank;

use BinaryStudioAcademy\Game\Modules\Inventory;

class Game
{
    
    public $metal;
    public $iron;
    public $fire;
    public $sand;
    public $copper;
    public $silicon;
    public $carbon;
    public $water;
    public $fuel;


    public $shell;
    public $control_unit;
    public $wires;
    public $ic;
    public $porthole;
    public $engine;
    public $launcher;
    public $tank;


    public $inventory;
    public $info;
    public $game_service;

    public function __construct() {
        $resource_factory = new ResourceFactory();
        $combined_resource_factory = new CombinedResourseFactory();
        $this->inventory = new Inventory();
        $this->iron = $resource_factory->createIron($this->inventory);
        $this->fire = $resource_factory->createFire($this->inventory);
        $this->copper = $resource_factory->createCopper($this->inventory);
        $this->silicon = $resource_factory->createSilicon($this->inventory);
        $this->sand = $resource_factory->createSand($this->inventory);
        $this->carbon = $resource_factory->createCarbon($this->inventory);
        $this->water = $resource_factory->createWater($this->inventory);
        $this->fuel = $resource_factory->createFuel($this->inventory);
        $this->metal = $combined_resource_factory->createMetal($this->iron, $this->fire,$this->inventory);
        
        $this->shell = new Shell($this->metal, $this->fire,$this->inventory);
        $this->ic = new Ic($this->metal, $this->silicon, $this->inventory);
        $this->wires = new Wires($this->copper, $this->fire, $this->inventory);
        $this->control_unit = new ControlUnit($this->ic, $this->wires, $this->inventory);
        $this->porthole = new Porthole($this->sand, $this->fire,$this->inventory);
        $this->engine = new Engine($this->metal, $this->carbon, $this->fire, $this->inventory);
        $this->launcher = new Launcher($this->water, $this->fire, $this->fuel, $this->inventory);
        $this->tank = new Tank($this->metal, $this->fuel, $this->inventory);
        
        $this->info  = require 'game_info.php';
       
        $this->game_service = new GameService($this);
    }
    
    public function start(Reader $reader, Writer $writer): void
    {
        while (true) {
                
            $writer->write("Type your command:");
            $input = trim($reader->read());
            $this->game_service->executeCommand($input);
            $writer->writeln($this->game_service->getMessage());
            if (!$this->game_service->is_game_completed) {
                break;
            }
        
        }
        
        $writer->writeln("You can't play yet. Please read input and convert it to commands.");
        $writer->writeln("Don't forget to create game's world.");
        $writer->write("Type your name:");
        $input = trim($reader->read());
        $writer->writeln("Good luck with this task, {$input}!");
    }

    public function run(Reader $reader, Writer $writer): void
    {
        $input = trim($reader->read());
        $this->game_service->executeCommand($input);
        $writer->writeln($this->game_service->getMessage());
        
        
        $writer->writeln("You can't play yet. Please read input and convert it to commands.");
        $writer->writeln("Don't forget to create game's world.");
    }
}
