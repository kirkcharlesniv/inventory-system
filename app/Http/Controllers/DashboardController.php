<?php
namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $smaws = DB::table('item_records')->where('stock_type', '0')->get();
        $pipes = DB::table('item_records')->where('stock_type', '1')->get();
        $dresses = DB::table('item_records')->where('stock_type', '2')->get();
        $conses = DB::table('item_records')->where('stock_type', '3')->get();
        $offices = DB::table('item_records')->where('stock_type', '4')->get();
        return view('dashboard.index')
            ->with('smaws', $smaws)
            ->with('pipes', $pipes)
            ->with('dresses', $dresses)
            ->with('conses', $conses)
            ->with('offices', $offices);
    }

    public function download() {
        date_default_timezone_set("Asia/Manila");
        $filename = 'Report ('.date('d-m-Y hA-i').').xlsx';
        return Excel::download(new UsersExport, $filename);
    }
}
