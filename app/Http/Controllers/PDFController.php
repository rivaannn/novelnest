<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Books;
// use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;


class PDFController extends Controller
{
    public function generateBookPdfReport() {

        $books = Books::all();
        $data = [
            'title' => "Data Laporan Buku",
            'date' => date('m/y/d'),
            'books' => $books
        ];
        $pdf = Pdf::loadView('reports/books_report', $data);
        return $pdf->download('books_report.pdf');
    }

    public function generateUserPdfReport() {
        $users = User::all();
        $data = [
            'title' => 'Data Laporan User',
            'date' => date('m/y/d'),
            'users' => $users
        ];
        $pdf = Pdf::loadView('reports/users_report', $data);
        return $pdf->download('books_report.pdf');
    }
}