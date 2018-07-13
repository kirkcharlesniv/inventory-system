<?php
namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Excel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function download() {
        date_default_timezone_set("Asia/Manila");
        $filename = 'Report ('.date('d-m-Y hA-i').').xlsx';
        return Excel::download(new UsersExport, $filename);
    }
}
