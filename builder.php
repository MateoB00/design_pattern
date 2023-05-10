<?php 
// Product Class
class Burger {
    private $size;
    private $meat;
    private $cheese;
    private $sauce;

    public function setSize($size) {
        $this->size = $size;
    }

    public function setMeat($meat) {
        $this->meat = $meat;
    }

    public function setCheese($cheese) {
        $this->cheese = $cheese;
    }

    public function setSauce($sauce) {
        $this->sauce = $sauce;
    }

    public function show() {
        $ingredients = [
            $this->size,
            $this->meat,
            $this->cheese,
            $this->sauce
        ];
        echo "Burger Ingredients: " . implode(', ', $ingredients);
    }
}

// Builder Interface
interface BurgerBuilder {
    public function createBurger();
    public function addSize();
    public function addMeat();
    public function addCheese();
    public function addSauce();
    public function getBurger();
}

// Concrete Builder
class HamburgerBuilder implements BurgerBuilder {
    private $burger;

    public function createBurger() {
        $this->burger = new Burger();
    }

    public function addSize() {
        $this->burger->setSize('Small');
    }

    public function addMeat() {
        $this->burger->setMeat('Beef');
    }

    public function addCheese() {
        $this->burger->setCheese('Cheddar');
    }

    public function addSauce() {
        $this->burger->setSauce('Ketchup');
    }

    public function getBurger() {
        return $this->burger;
    }
}

// Director Class
class BurgerDirector {
    private $burgerBuilder;

    public function setBuilder(BurgerBuilder $burgerBuilder) {
        $this->burgerBuilder = $burgerBuilder;
    }

    public function getBurger() {
        return $this->burgerBuilder->getBurger();
    }

    public function buildBurger() {
        $this->burgerBuilder->createBurger();
        $this->burgerBuilder->addSize();
        $this->burgerBuilder->addMeat();
        $this->burgerBuilder->addCheese();
        $this->burgerBuilder->addSauce();
    }
}

// Client Code
$director = new BurgerDirector();
$builder = new HamburgerBuilder();
$director->setBuilder($builder);
$director->buildBurger();
$burger = $director->getBurger();
$burger->show();