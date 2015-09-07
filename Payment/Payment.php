<?php
namespace WatcherHangzhouPayment\Payment;

class Payment {

    public static function createRequest($name, $params = array()) {
        $name = ucfirst(strtolower($name));
        $class = __NAMESPACE__ . "\\{$name}\\{$name}Request";

        if (!class_exists($class)) {
            throw new \Exception("Payment request {$name} is not exist!");
        }
        $configClass = __NAMESPACE__ . "\\{$name}\\{$name}Config";

        return new $class($configClass::getSettings(), $params);
    }

    public static function createCloseTradeRequest($name, $options = array()) {
        $name = ucfirst(strtolower($name));
        $class = __NAMESPACE__ . "\\{$name}\\{$name}CloseTradeRequest";

        if (!class_exists($class)) {
            throw new \Exception("Payment close trade request {$name} is not exist!");
        }
        return new $class($options);
    }

    public static function createResponse($name, $options = array()) {
        $name = ucfirst(strtolower($name));
        $class = __NAMESPACE__ . "\\{$name}\\{$name}Response";

        if (!class_exists($class)) {
            throw new \Exception("Payment response {$name} is not exist!");
        }
        return new $class($options);
    }

    private function __construct() { }
}