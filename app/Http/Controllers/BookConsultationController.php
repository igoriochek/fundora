<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultationRequest;
use App\Mail\ConsultationSubmitted;
use App\Models\Consultation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class BookConsultationController extends Controller
{
    public function index(): View
    {
        return view('book_consulation.index');
    }

    public function store(StoreConsultationRequest $request): RedirectResponse
    {
        try {
            $consultationInput = $request->validated();
            $consultation = Consultation::create($consultationInput);

            Mail::to('info@fundoraglobal.com')
                ->send(new ConsultationSubmitted($consultation));

            return redirect(route('book-consultation.index'))
                ->with('success', __('messages.successConsultationSubmit'));
        } catch (\Exception $e) {
            return back()
                ->with('error', $e->getMessage());
        }
    }
}
