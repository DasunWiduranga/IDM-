<?php

namespace App\Http\Controllers;

use OwenIt\Auditing\Models\Audit;

class AuditController extends Controller
{
    public function index()
    {
        // Fetch all audit logs, optionally with pagination
        $audits = Audit::latest()->paginate(10);

        // Pass the audit logs to the view
        return view('audits.index', compact('audits'));
    }
}
