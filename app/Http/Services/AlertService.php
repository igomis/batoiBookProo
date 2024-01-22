<?php

namespace App\Http\Services;

class AlertService
{
    public static function __callStatic($name, $arguments)
    {
        $colorMap = [
            'success' => 'green',
            'error'   => 'red',
            'warning' => 'yellow',
            'info'    => 'blue'
        ];
        try {
            if (!in_array($name, ['success', 'error', 'warning', 'info'])) {
                throw new \Exception('AlertService type not allowed');
            }
            if (empty($arguments)) {
                throw new \Exception('AlertService message is required');
            }
            if (count($arguments) > 1) {
                throw new \Exception('Too many arguments');
            }

            session()->flash('alert', ['type' => $colorMap[$name],'message' => $arguments[0]]);
            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
