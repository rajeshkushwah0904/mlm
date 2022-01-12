<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnWidths, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $orders = \App\Order::whereBetween('created_at', [request()->start_date, request()->end_date])->get();

        $output = [];
        foreach ($orders as $key => $order) {

            $output[$order->id][] = $key + 1;
            $output[$order->id][] = $order->invoice_no;
            $output[$order->id][] = $order->distributor_name;
            $output[$order->id][] = $order->gst_no;
            $output[$order->id][] = $order->email;
            $output[$order->id][] = $order->mobile;
            $output[$order->id][] = $order->gender;
            $output[$order->id][] = $order->address;
            $output[$order->id][] = $order->pincode;
            $output[$order->id][] = $order->total_taxable_amount;
            $output[$order->id][] = $order->total_gst_amount;
            $output[$order->id][] = $order->total_amount;
            $output[$order->id][] = $order->delivery_amount;
            $output[$order->id][] = $order->grand_total;
        }

        return collect($output);
    }
    public function headings(): array
    {

        $heading1 = array(
            'S. No.',
            'Invoice No.',
            'Name',
            'GST No.',
            'Email',
            'Mobile',
            'Gender',
            'Address',
            'Pincode',
            'Total Taxable Amount',
            'Total GST Amount',
            'Total Amount',
            'Delivery Amount',
            'Grand Total',
        );
        return [
            $heading1,
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 20,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'F' => 20,
            'G' => 20,
            'H' => 20,
            'I' => 20,
            'J' => 20,
            'K' => 20,
            'L' => 20,
            'M' => 20,
            'N' => 20,
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