<?php

namespace App\Exports;

use App\Distributor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DistributorsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnWidths, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $distributors = \App\Distributor::all();

        $output = [];
        foreach ($distributors as $key => $distributor) {
            if ($distributor->status == 2) {
                $distributor_status = "Block";
            } else {
                if ($distributor->package) {
                    $distributor_status = "Activate";
                } else {
                    $distributor_status = "Free";
                }
            }

            $output[$distributor->id][] = $key + 1;
            $output[$distributor->id][] = $distributor_status;
            $output[$distributor->id][] = $distributor->joining_date;
            $output[$distributor->id][] = $distributor->activate_date;
            $output[$distributor->id][] = $distributor->distributor_tracking_id;
            $output[$distributor->id][] = $distributor->name;
            $output[$distributor->id][] = $distributor->mobile;
            $output[$distributor->id][] = null;

            if ($distributor->my_sponsor) {
                $output[$distributor->id][] = $distributor->my_sponsor->distributor_tracking_id;
                $output[$distributor->id][] = $distributor->my_sponsor->name;
                $output[$distributor->id][] = $distributor->my_sponsor->mobile;
            } else {
                $output[$distributor->id][] = null;
                $output[$distributor->id][] = null;
                $output[$distributor->id][] = null;
            }

            if ($distributor->package) {
                $output[$distributor->id][] = $distributor->package->package_name;
            } else {
                $output[$distributor->id][] = null;
            }

            if ($distributor->package) {
                $output[$distributor->id][] = $distributor->package->package_name;
                $output[$distributor->id][] = $distributor->package->amount;
            } else {
                $output[$distributor->id][] = null;
                $output[$distributor->id][] = null;
            }

        }

        return collect($output);
    }
    public function headings(): array
    {

        $heading1 = array('S. No.',
            'DISTRIBUTOR STATUS',
            'JOINING DATE',
            'ACTIVATION DATE',
            'DISTRIBUTOR ID',
            'DISTRIBUTOR NAME',
            'MOBILE',
            'BALANCE',
            'SPONSOR ID',
            'SPONSOR NAME',
            'SPONSOR MOBILE',
            'KYC',
            'PACKAGE',
            'DISTRIBUTOR PAID',
        );
        return [
            $heading1,
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 30,
            'G' => 30,
            'H' => 30,
            'I' => 30,
            'J' => 30,
            'K' => 30,
            'L' => 30,
            'M' => 30,
            'N' => 30,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $style = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '000000'),
                'size' => 10,
                'name' => 'Arial',
            ), 'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        );
        $sheet->getStyle('A1:N1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00A7B5');
        $sheet->getStyle('A1:N1')->applyFromArray($style);
        $sheet->setTitle('Report');
    }
}