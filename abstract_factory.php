<?php
// Abstract Factory Interface
interface CarFactory {
    public function createEngine();
    public function createWindow();
}

// Concrete Factories
class DieselCarFactory implements CarFactory {
    public function createEngine() {
        return new DieselEngine();
    }
    public function createWindow() {
        return new ManualWindow();
    }
}

class PetrolCarFactory implements CarFactory {
    public function createEngine() {
        return new PetrolEngine();
    }
    public function createWindow() {
        return new ElectricWindow();
    }
}

// Abstract Product Interfaces
interface Engine {
    public function getType();
}

interface Window {
    public function getType();
}

// Concrete Products
class DieselEngine implements Engine {
    public function getType() {
        return "Diesel Engine";
    }
}

class PetrolEngine implements Engine {
    public function getType() {
        return "Petrol Engine";
    }
}

class ElectricWindow implements Window {
    public function getType() {
        return "Electric Window";
    }
}

class ManualWindow implements Window {
    public function getType() {
        return "Manual Window";
    }
}

// Client Code
// Creating the Diesel Car
$dieselCarFactory = new DieselCarFactory();
$dieselEngine = $dieselCarFactory->createEngine();
$dieselWindow = $dieselCarFactory->createWindow();

echo "Diesel Car Model has " . $dieselEngine->getType() . " and " . $dieselWindow->getType() . ".";

// Creating the Petrol Car
$petrolCarFactory = new PetrolCarFactory();
$petrolEngine = $petrolCarFactory->createEngine();
$petrolWindow = $petrolCarFactory->createWindow();

echo "Petrol Car Model has " . $petrolEngine->getType() . " and " . $petrolWindow->getType() . ".";