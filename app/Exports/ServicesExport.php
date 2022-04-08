<?php

namespace App\Exports;

use DB;
use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ServicesExport implements FromCollection, WithHeadings, WithMapping, WithEvents, ShouldAutoSize
{


    // set the collection of members to export
    public function collection()
    {
        /* return Service::select(
            'person_served', 
            'area',
            'type_service',
            'description',
            'date_start_service',
            'date_end_service',
        )->get(); */

        // $service_data = DB::table('services')
        // ->join('users', 'users.id', '=', 'services.personal_id')
        // ->select('services.*', 'users.name as personalNombre')
        // ->get()->dd();

        return Service::with('personal')->get();
    }


    // Heading
    public function headings(): array
    {
/*         return [
            'Persona atendida',
            'Area',
            'Tipo de servicio',
            'Descripción',
            'Fecha de inicio',
            'Fecha de termio',
        ]; */

        return [

        'Id Servicio',
        'Persona atendida',
        'Area',
        'Tipo de servicio',
        'Descripción',
        'Persona que atendió',
        'Fecha de inicio',
        'Fecha de termino',
        ];
    }

    // Mapping the Model Service
    public function map($service) : array {
        return [
            $service->id,
            $service->person_served,
            $service->area,
            $service->type_service,
            $service->description,
            $service->personal->name,
            $service->date_start_service,
            $service->date_end_service,
        ] ;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:H1')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('9DD5FA');
            },
        ];
    }

}

