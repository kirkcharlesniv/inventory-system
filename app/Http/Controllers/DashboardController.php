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
        $smaws_t = DB::table('item_records')->where('stock_type', '0')->where('inventory_type', '0')->get();
        $smaws_m = DB::table('item_records')->where('stock_type', '0')->where('inventory_type', '1')->get();

        $pipes_t = DB::table('item_records')->where('stock_type', '1')->where('inventory_type', '0')->get();
        $pipes_m = DB::table('item_records')->where('stock_type', '1')->where('inventory_type', '1')->get();

        $dresses_t = DB::table('item_records')->where('stock_type', '2')->where('inventory_type', '0')->get();
        $dresses_m = DB::table('item_records')->where('stock_type', '2')->where('inventory_type', '1')->get();

        $conses_t = DB::table('item_records')->where('stock_type', '3')->where('inventory_type', '0')->get();
        $conses_m = DB::table('item_records')->where('stock_type', '3')->where('inventory_type', '1')->get();

        $offices_t = DB::table('item_records')->where('stock_type', '4')->where('inventory_type', '0')->get();
        $offices_m = DB::table('item_records')->where('stock_type', '4')->where('inventory_type', '1')->get();

        return view('dashboard.index')
            ->with('smaws_t', $smaws_t)
            ->with('pipes_t', $pipes_t)
            ->with('dresses_t', $dresses_t)
            ->with('conses_t', $conses_t)
            ->with('offices_t', $offices_t)
            ->with('smaws_m', $smaws_m)
            ->with('pipes_m', $pipes_m)
            ->with('dresses_m', $dresses_m)
            ->with('conses_m', $conses_m)
            ->with('offices_m', $offices_m);
    }

    public function download() {
        date_default_timezone_set("Asia/Manila");
        $filename = 'Report ('.date('d-m-Y h:iA').').xlsx';
        return Excel::download(new UsersExport, $filename);
    }
}
