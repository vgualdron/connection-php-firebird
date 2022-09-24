<?php
    namespace App\Services\Implementations;
    use App\Services\Interfaces\MovementServiceInterface;
    use App\Models\Ticket;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\DB;

    class MovementServiceImplement implements MovementServiceInterface{
        
        private $model;

        function __construct(){
            $this->model = new Ticket;
        }    

        function generate(int $year, array $data){
            $arrayResponse = array('success' => true, 'data' => []);
            try{
                $movements = isset($data['data']) ? $data['data'] : [];
                if(count($movements) > 0) {
                    config(['database.connections.firebird.database' => env('DB_DATABASEFB').$year.'.GDB']);
                    $arrayTickets = [];
                    foreach ($movements as $itemMovement) {
                        $ticket = new $this->model;
                        $ticket->PREFIJO = $itemMovement['PREFIJO'];
                        $ticket->CCOSTO = $itemMovement['CCOSTO'];
                        $ticket->NUMERO = $itemMovement['NUMERO'];
                        $ticket->FECHA = $itemMovement['FECHA'];
                        $ticket->ORIGEN = $itemMovement['ORIGEN'];
                        $ticket->DESTINO = $itemMovement['DESTINO'];
                        $ticket->PLACA = $itemMovement['PLACA'];
                        $ticket->ART1 = $itemMovement['ART1'];
                        $ticket->BODEGA = $itemMovement['BODEGA'];
                        $ticket->ART2 = $itemMovement['ART2'];
                        $ticket->BODEGA2 = $itemMovement['BODEGA2'];
                        $ticket->BRUTO = str_replace(',', '',$itemMovement['BRUTO']);
                        $ticket->TARA = str_replace(',', '',$itemMovement['TARA']);
                        $ticket->NETO = str_replace(',', '',$itemMovement['NETO']);
                        $ticket->TARIFAC = str_replace(',', '',$itemMovement['TARIFAC']);
                        $ticket->TARIFAT = str_replace(',', '',$itemMovement['TARIFAT']);
                        $ticket->TIPOES = $itemMovement['TIPOES'];
                        $ticket->OBS = utf8_decode($itemMovement['OBS']);
                        $ticket->NITTRANS = $itemMovement['NITTRANS'];
                        $ticket->TICKET = $itemMovement['TICKET'];
                        $ticket->save();
                        $arrayTickets[] = $itemMovement['TICKET'];
                    }
                    $generateds = $this->model->select('TICKETMOVID', 'TICKET')
                                                ->whereIn('TICKET', $arrayTickets)
                                                ->get();
                    $arrayResponse['data'] = $generateds;
                } else {
                    $arrayResponse['success'] = false;
                    $arrayResponse['message'] = 'Datos vacios';
                }
            } catch (\Throwable $e) {
                $arrayResponse['success'] = false;
                $arrayResponse['message'] = 'Se ha presentado un problema al generar los tickets';
            }
            return $arrayResponse;
        }
    }
?>