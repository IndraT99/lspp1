<?php
namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        return view('certificate.check');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'certificate_number' => 'required|string',
        ]);

        $assessment = Assessment::with(['user', 'scheme'])
            ->where('certificate_number', $request->certificate_number)
            ->where('status', 'completed')
            ->where('final_result', 'K')
            ->first();

        return view('certificate.check', [
            'result' => $assessment,
            'search_performed' => true,
            'search_query' => $request->certificate_number
        ]);
    }
}