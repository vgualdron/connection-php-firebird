<?php
    namespace App\Services\Implementations;
    use App\Services\Interfaces\ThirdServiceInterface;
    use App\Models\Third;
    use Illuminate\Support\Facades\Hash;
    
    class ThirdServiceImplement implements ThirdServiceInterface{
        
        private $model;

        function __construct(){
            $this->model = new Third;
        }    

        function list(int $year){
            try{
				config(['database.connections.firebird.database' => env('DB_DATABASEFB').$year.'.GDB']);
                return $this->model->where('CLIENTE','=', 'S')
                                    ->orWhere('ASOCIADO','=', 'S')
                                    ->orWhere('CONTRATISTA','=', 'S')
                                    ->selectRaw("TERID, CAST(NIT AS VARCHAR(200) CHARACTER SET ISO8859_1) NIT, CAST(NOMBRE AS VARCHAR(200) CHARACTER SET ISO8859_1) AS NOMBRE, IIF(CLIENTE = 'S', 1, 0) AS CLIENTE, IIF(ASOCIADO = 'S', 1, 0) AS ASOCIADO, IIF(CONTRATISTA = 'S', 1, 0) AS CONTRATISTA")
                                    ->get();
            } catch (\Exception $e) {
                echo var_dump($e->getMessage());
            }
        }
		
		function listByType(string $type, int $year){
            try{
				config(['database.connections.firebird.database' => env('DB_DATABASEFB').$year.'.GDB']);
                return $this->model->where($type,'=', 'S')
                                    ->selectRaw("TERID, CAST(NIT AS VARCHAR(200) CHARACTER SET ISO8859_1) NIT, CAST(NOMBRE AS VARCHAR(200) CHARACTER SET ISO8859_1) AS NOMBRE, IIF(CLIENTE = 'S', 1, 0) AS CLIENTE, IIF(ASOCIADO = 'S', 1, 0) AS ASOCIADO, IIF(CONTRATISTA = 'S', 1, 0) AS CONTRATISTA")
                                    ->get();
            } catch (\Exception $e) {
                echo var_dump($e->getMessage());
            }
        }
    }
?>