<?php

namespace App\Http\Controllers\LivewireServices;

use App\Http\Controllers\Controller;
use mikehaertl\pdftk\Pdf;

class PDFService extends Controller
{
    public function fillPdf($fillable = [], $form)
    {

        $nameFiles = [
            "kitchen_inspection" => "kitchen_inspection.pdf",
            "surface_inspection" => "surface_inspection.pdf",
            "external_warehouses" => "external_warehouses.pdf",
            "staircase" => "staircase.pdf",
            "CO2" => "CO2.pdf",
            "FM200" => "FM200.pdf",
            "emergency_exits" => "emergency_exits.pdf",
            "fire_blankets" => "fire_blankets.pdf",
            "fire_hoses" => "fire_hoses.pdf",
            "emergency_headlamps" => "emergency_headlamps.pdf",
            "elevator_inspection" => "elevator_inspection.pdf",
            "emergency_shower_eye_wash" => "emergency_shower_eye_wash.pdf",
            "eye_wash" => "eyeWash.pdf",
            "glass_breaker_fire_detectors" => "glass_breaker_fire_detectors.pdf",
            "night_inspection_tour" => "night_inspection_tour.pdf",
            "direct_status_report" => "direct_status_report.pdf",
            "daily_notes" => "daily_tours.pdf",
            "fire_sprinklers" => "fire_sprinklers.pdf",
            "fire_extinguishers" => "fire_extinguishers.pdf",

            "warehouse" => "warehouse.pdf",
            "generators" => "generators.pdf",
            "refrigerants" => "refrigerants.pdf",
            "boilers" => "boilers.pdf",
        ];

        $name = $nameFiles[$form->name];

        $original_pdf = public_path() . '/pdfs/' . $name;
        $temp_path = public_path() . '/pdf-viewer/web/pdfs/' . $name;

        $pdf = new Pdf($original_pdf, [
            'locale' => 'ar_SA.utf8',
            'procEnv' => [
                'LANG' => 'ar_SA.utf-8',
            ],
            // 'command' => 'C:\Program Files (x86)\PDFtk\bin\pdftk.exe',
            // 'useExec' => true,
        ]);

        $result = $pdf->fillForm($fillable)
            ->needAppearances()
            ->saveAs($temp_path);

        if ($result === false) {
            dd($pdf->getError());
        }

        return  $name;
    }
}
