<?php

// The Subject Interface
interface Subject {
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

// The Concrete Subject
class MessageSystem implements Subject {
    private $observers = [];
    private $messages = [];

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function sendMessage($message, $recipient) {
        $this->messages[] = [
            'message' => $message,
            'recipient' => $recipient
        ];
        $this->notify();
    }

    public function getMessages($email) {
        $recipientMessages = [];
        foreach ($this->messages as $message) {
            if ($message['recipient'] == $email) {
                $recipientMessages[] = $message['message'];
            }
        }
        return $recipientMessages;
    }
}

// The Observer Interface
interface Observer {
    public function update(Subject $subject);
}

// The Concrete Observer
class User implements Observer {
    private $email;
    private $messageSystem;

    public function __construct($email, MessageSystem $messageSystem) {
        $this->email = $email;
        $this->messageSystem = $messageSystem;
        $this->messageSystem->attach($this);
    }

    public function update(Subject $subject) {
        if ($subject instanceof MessageSystem) {
            $messages = $subject->getMessages($this->email);
            if (!empty($messages)) {
                echo "New Messages:\n";
                foreach ($messages as $message) {
                    echo "- $message\n";
                }
            }
        }
    }
}

// Creating Objects and Sending Messages
$messageSystem = new MessageSystem();
$user1 = new User('john.smith@example.com', $messageSystem);
$user2 = new User('jane.doe@example.com', $messageSystem);
$messageSystem->sendMessage('Hello!', 'john.smith@example.com');
$messageSystem->sendMessage('How are you?', 'jane.doe@example.com');
$messageSystem->sendMessage('I\'m good, thanks. How about you?', 'john.smith@example.com');

// Removing One Observer and Sending One More Message
$messageSystem->detach($user2);
$messageSystem->sendMessage('Anything new?', 'jane.doe@example.com');