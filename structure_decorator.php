<?php 

// The Component Interface
interface Component {
    public function operation();
}

// The Concrete Components
class ConcreteComponentA implements Component {
    public function operation() {
        echo "ConcreteComponentA operation\n";
    }
}

class ConcreteComponentB implements Component {
    public function operation() {
        echo "ConcreteComponentB operation\n";
    }
}

// The Decorator Abstract Class
abstract class Decorator implements Component {
    protected $component;
    public function __construct(Component $component) {
        $this->component = $component;
    }
    public function operation() {
        $this->component->operation();
    }
}

// The Concrete Decorators
class ConcreteDecoratorA extends Decorator {
    public function operation() {
        parent::operation();
        echo "ConcreteDecoratorA operation\n";
    }
}

class ConcreteDecoratorB extends Decorator {
    public function operation() {
        parent::operation();
        echo "ConcreteDecoratorB operation\n";
    }
}

// Creating Objects
$componentA = new ConcreteComponentA();
$decoratorA = new ConcreteDecoratorA($componentA);
$decoratorAB = new ConcreteDecoratorB($decoratorA);
$decoratorAB->operation();