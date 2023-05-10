<?php
// Pattern de création : Factory Method
// Le pattern Factory Method consiste à déléguer la création d'objets à une méthode spécialisée, plutôt que de les instancier directement dans le code. Cela permet de rendre le code plus modulaire et plus facile à maintenir.

interface PaymentMethod {
    public function pay($amount);
}

class CreditCardPayment implements PaymentMethod {
    public function pay($amount) {
        // implementation to pay with credit card
    }
}

class PayPalPayment implements PaymentMethod {
    public function pay($amount) {
        // implementation to pay with PayPal
    }
}

class PaymentMethodFactory {
    public function createPaymentMethod($method) {
        switch ($method) {
            case 'creditcard':
                return new CreditCardPayment();
            case 'paypal':
                return new PayPalPayment();
            default:
                throw new Exception('Invalid payment method');
        }
    }
}
            
$paymentMethodFactory = new PaymentMethodFactory();
$paymentMethod = $paymentMethodFactory->createPaymentMethod('creditcard');
$paymentMethod->pay(100);