<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Pelaporan;
use Illuminate\Http\Request;
use App\Models\FeedbackReply;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PelaporanSelesaiController extends Controller
{
    public function index()
    {
        return view('pelaporan-selesai.index', [
            'pelaporans'    => Pelaporan::where('status', 'selesai')->orderBy('updated_at', 'DESC')->get()
        ]);
    }

    public function cetakLaporan($id)
    {
        $pelaporan = Pelaporan::find($id);
        $feedback       = Feedback::where('pelaporan_id', $pelaporan->id)->first();
        $feedbackReply  = $feedback ? FeedbackReply::where('feedback_id', $feedback->id)->first() : null;


        $pdf = PDF::loadView('pelaporan-selesai.cetak-laporan', [
            'pelaporan'    => $pelaporan,
            'feedback'      => $feedback,
            'feedbackReply' => $feedbackReply
        ]);

        return $pdf->stream('cetak-laporan.pdf');
    }
}
