<?php

namespace App\Exports;

use App\Order;
use App\Customer;
use App\CustomerLocation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use DB;

class OrderExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         
         return DB::table('orders')
                ->join('customer_locations', 'orders.customer_location_id', '=', 'customer_locations.id')
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->select('customers.customer_code','customers.customer_name','orders.grade','orders.quantity','orders.rate','customer_locations.location_name')
                ->get();
    }
    public function headings(): array
    {
        return [
            'Party Code',
            'Party Name',
            'Grade',
            'Qty',
            'Rate',
            'Destination'	
        ];
    }
     public function registerEvents(): array
    {
        
        $styleArray = [
        'font' => [
        'bold' => true,
        ]
        ];
            
        
        
        return [
            AfterSheet::class    => function(AfterSheet $event) use ($styleArray)
            {
                $cellRange = 'A1:G1'; // All headers
                //$event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Calibri');
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(11);
                $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
                $event->sheet->getStyle('A9:G9')->ApplyFromArray($styleArray);
                $event->sheet->getStyle('A12:G12')->ApplyFromArray($styleArray);
                $event->sheet->getStyle('A19:G19')->ApplyFromArray($styleArray);
                $event->sheet->getStyle('A27:G27')->ApplyFromArray($styleArray);
                $event->sheet->getStyle('A31:G31')->ApplyFromArray($styleArray);
                $event->sheet->getStyle('A35:G35')->ApplyFromArray($styleArray);
                $event->sheet->getStyle('A36:G36')->ApplyFromArray($styleArray);
                $event->sheet->getStyle('A42:G42')->ApplyFromArray($styleArray);
                $event->sheet->getStyle('A43:G43')->ApplyFromArray($styleArray);
            },
        ];
    }
}
