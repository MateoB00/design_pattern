// Pattern structurel : Adapter
// Le pattern Adapter permet de faire collaborer des objets qui n'ont pas la même interface, en créant une interface commune pour les deux objets. Cela permet d'éviter de modifier le code source de l'un ou de l'autre objet.
<?php

interface PaymentGateway {
    public function processPayment($amount);
}

class StripeGateway {
    public function charge($amount) {
        // implementation to charge with Stripe
    }
}

class StripeAdapter implements PaymentGateway {
    private $stripeGateway;
    
    public function __construct(StripeGateway $stripeGateway) {
        $this->stripeGateway = $stripeGateway;
    }
    
    public function processPayment($amount) {
        $this->stripeGateway->charge($amount);
    }
}

$stripeGateway = new StripeGateway();
$stripeAdapter = new StripeAdapter($stripeGateway);
$stripeAdapter->processPayment(100);

?>