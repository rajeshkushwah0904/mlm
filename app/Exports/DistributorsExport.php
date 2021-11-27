<?php

namespace App\Exports;

use App\Distributor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DistributorsExport implements FromCollection,WithHeadings,ShouldAutoSize,WithColumnWidths,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $distributors = \App\Distributor::all();

		$output = [];
		foreach($distributors AS $key=>$distributor){
            $output[$distributor->id][] = $distributor->id;
			$output[$distributor->id][] = $distributor->name;
             $output[$distributor->id][] = $distributor->email;
            $output[$distributor->id][] = $distributor->distributor_tracking_id;
            $output[$distributor->id][] = $distributor->address;
            $output[$distributor->id][] = $distributor->mobile;
            $output[$distributor->id][] = $distributor->dob;
            $output[$distributor->id][] = $distributor->distributor_tracking_id;
            $output[$distributor->id][] = $distributor->distributor_tracking_id;
            $output[$distributor->id][] = $distributor->distributor_tracking_id;

            
              $vendor_group = \App\VendorGroup::find($vendor->vendor_group_id);
            if($vendor_group){
			  $output[$vendor->id][] = $vendor_group->name;
            }else{
              $output[$vendor->id][] = $vendor->vendor_group_id;
            }

              $state = \App\State::find($vendor->state_id);
            if($state){
			  $output[$vendor->id][] = $state->name;
            }else{
              $output[$vendor->id][] = $vendor->state_id;
            }

               $division_plant = \App\Division_plant::find($vendor->division_plant_id);
             if($division_plant){
			  $output[$vendor->id][] = $division_plant->name;
            }else{
              $output[$vendor->id][] = $vendor->division_plant_id;
            }

		}
	
       return collect($output);
    }
    	public function headings(): array {
		
		$heading1= array('Serial No', 'Vendor Code','Vendor Name','Trade Name','Vendor Group','State', 'unit');
		return [
			$heading1,
		];
	}
    public function columnWidths(): array
    {
		return [
           'A'=>10,        
           'B'=>30,
           'C'=>30,
        ];
    }
	
	public function styles(Worksheet $sheet)
    {  
		$style = array(
			'font'  => array(
			'bold'  => true,
			'color' => array('rgb' => 'ffffff'),
			'size'  => 9,
			'name'  => 'Arial',
			), 'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'ffffff'],
                    ],
                ],
		);
		$sheet->getStyle('A1:I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A7B5');
		$sheet->getStyle('A1:I1')->applyFromArray($style);
		$sheet->setTitle('Report');
    }
}
