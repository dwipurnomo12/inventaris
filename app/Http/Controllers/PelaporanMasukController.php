<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Pelaporan;
use Illuminate\Http\Request;
use App\Models\FeedbackReply;
use App\Http\Controllers\Controller;

class PelaporanMasukController extends Controller
{
    public function index()
    {
        return view('pelaporan-masuk.index', [
            'pelaporans'    => Pelaporan::whereNot('status', 'selesai')->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function detail($id)
    {
        $pelaporan      = Pelaporan::findOrFail($id);
        $feedback       = Feedback::where('pelaporan_id', $pelaporan->id)->first();
        $feedbackReply  = $feedback ? FeedbackReply::where('feedback_id', $feedback->id)->first() : null;
        return view('pelaporan-masuk.detail', [
            'pelaporan'     => $pelaporan,
            'feedback'      => $feedback,
            'feedbackReply' => $feedbackReply
        ]);
    }

    public function perbaiki($id)
    {
        $pelaporan = Pelaporan::findOrFail($id);
        $pelaporan->update(['status' => 'sedang diperbaiki']);

        return redirect()->back()->with('success', 'Berhasil mengubah status pelaporan menjadi Sedang Diperbaiki');
    }

    public function selesai(Request $request, $id)
    {
        $pelaporan = Pelaporan::findOrFail($id);
        $pelaporan->update(['status' => 'selesai']);

        $feedback = new Feedback([
            'pelaporan_id'       => $request->pelaporan_id,
            'analisis_perbaikan' => $request->analisis_perbaikan,
        ]);

        $feedback->save();

        return redirect()->back()->with('success', 'Berhasil mengubah status pelaporan menjadi Selesai');
    }
}
