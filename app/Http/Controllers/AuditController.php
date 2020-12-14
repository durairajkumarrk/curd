<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuditController extends Controller
{
    public function index()
    {
        $audits = \OwenIt\Auditing\Models\Audit::with('user')
            ->where('auditable_type','App\Book')->orderBy('created_at', 'desc')->get();
        return view('audits', ['audits' => $audits]);
    }

}
