<?php 

namespace App\Patterns\State;

class ConcreteState extends State
{
    public function handle(): int
    {   
        $result = 20;

        return $result;
    }
}