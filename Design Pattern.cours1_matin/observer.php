<?php

interface Observer {
    public function update($data);
}

interface Subject {
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify($data);
}

class User implements Subject {
    private $observers = array();
    private $data;

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify($data) {
        foreach ($this->observers as $observer) {
            $observer->update($data);
        }
    }

    public function setData($data) {
        $this->data = $data;
        $this->notify($data);
    }
}

class Logger implements Observer {
    public function update($data) {
        echo "Logging data: " . $data . "\n";
    }
}

class EmailSender implements Observer {
    public function update($data) {
        echo "Sending email: " . $data . "\n";
    }
}

$user = new User();
$logger = new Logger();
$emailSender = new EmailSender();

$user->attach($logger);
$user->attach($emailSender);

$user->setData("New user registered");
// Output:
// Logging data: New user registered
// Sending email: New user registered

$user->detach($logger);

$user->setData("User profile updated");
// Output:
// Sending email: User profile updated


/*
    Le pattern "Observer" permet à un objet, appelé "sujet", de notifier un groupe d'objets, appelés "observateurs", lorsqu'un événement se produit. Les observateurs peuvent alors réagir à cet événement selon leurs besoins.
    
    Dans cet exemple, la classe "User" est le sujet qui notifie ses observateurs lorsqu'une donnée est mise à jour à l'aide de la méthode "setData". 
    Les observateurs, "Logger" et "EmailSender", implémentent l'interface "Observer" et réagissent à l'événement en appelant leur méthode "update".
*/