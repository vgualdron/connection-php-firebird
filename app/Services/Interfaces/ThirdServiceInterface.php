<?php
    namespace App\Services\Interfaces;
    
    interface ThirdServiceInterface
    {
        function list(int $year);
		function listByType(string $type, int $year);
    }
?>