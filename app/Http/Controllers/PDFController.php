<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Barryvdh\DomPDF\Facade\Pdf;
    // use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PDFController extends Controller
{
    public function generateBookPdfReport() {

        $books = Books::all();
        $data = [
            'title' => "wkwkwkwkwk",
            'date' => date('m/y/d'),
            'books' => $books
        ];
        $pdf = Pdf::loadView('books_report', $data);
        return $pdf->download('books_report.pdf');
    }
}
