<?php
    namespace App\Services\Interfaces;
    
    interface MovementServiceInterface
    {
        function generate(int $year, array $data);
    }
?>