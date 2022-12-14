<?php

namespace App\Http\Controllers;

use App\Http\Requests\SweepstakesParticipantStoreRequest;
use App\Http\Requests\SweepstakesStoreRequest;
use App\Http\Requests\SweepstakesUpdateRequest;
use App\Models\Sweepstake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WinnerMail;

class SweepstakesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sweepstakes = Sweepstake::where('user_id', Auth::user()->id)
            ->orderBy('created_at')
            ->get();
        $near_sweepstakes = Sweepstake::where('user_id', Auth::user()->id)
            ->whereDate('end_date', '>', now())
            ->limit(4)
            ->orderBy('end_date', 'asc')
            ->get();

        return response()->view('sweepstakes.index', [
            'near_sweepstakes' => $near_sweepstakes,
            'sweepstakes' => $sweepstakes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sweepstakes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SweepstakesStoreRequest $request)
    {
        Sweepstake::create($request->all());

        return redirect()->route('sweepstakes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sweepstake = Sweepstake::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        return response()->view('sweepstakes.show', [
            'sweepstake' => $sweepstake
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Essa valida????o pode ser feita no authorization do form request
        $sweepstake = Sweepstake::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        return response()->view('sweepstakes.edit', [
            'sweepstake' => $sweepstake
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SweepstakesUpdateRequest $request, Sweepstake $sweepstake)
    {
        // A valida????o do id est?? sendo feita no athorization do form request
        $sweepstake->update($request->all());

        return redirect()->route('sweepstakes.show', $sweepstake->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $sweepstake = Sweepstake::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($sweepstake) {
            $sweepstake->delete();
        }

        return redirect()->route('sweepstakes.index');
    }

    /**
     * @param Sweepstake $sweepstake
     * @return \Illuminate\Http\Response
     */
    public function register(Sweepstake $sweepstake)
    {
        return response()->view('sweepstakes.register', [
            'sweepstake' => $sweepstake
        ]);
    }

    /**
     * @param SweepstakesParticipantStoreRequest $request
     * @param Sweepstake $sweepstake
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeParticipant(SweepstakesParticipantStoreRequest $request, Sweepstake $sweepstake)
    {
        $sweepstake->participants()->create($request->all());

        return redirect()->back()
            ->with('success', 'Cadastro realizado com sucesso!');
    }

    /**
     * @param Sweepstake $sweepstake
     * @return \Illuminate\Http\Response
     */
    public function draw(Sweepstake $sweepstake)
    {
        if ($sweepstake->user_id === Auth::user()->id) {
            // Para acessar o banco de dados mais de uma vez
            $winnersCount = $sweepstake->winnersCount();

            if ($winnersCount < $sweepstake->number_of_winners) {

                $number_of_winners = $sweepstake->number_of_winners - $winnersCount;

                $winners = $sweepstake->participants()
                    ->whereNull('awarded_at')
                    ->inRandomOrder()
                    ->limit($number_of_winners)->get();

                // O use ($sweepstake) ?? para a vari??vel ficar dispon??vel dentro do closure
                $winners->each(function ($winner) use ($sweepstake) {
                    $winner->update(['awarded_at' => now()]);

                    Mail::to($winner->email)
                        // Email vai ser enviado usando fila
                        ->queue(new WinnerMail($sweepstake));
                });
            } else {
                $winners = $sweepstake->participants()->whereNotNull('awarded_at')->get();
            }

            return response()->view('sweepstakes.winners',[
                'winners' => $sweepstake->participants()->whereNotNull('awarded_at')->get(),
                'sweepstake' => $sweepstake,
            ]);
        }
    }
}
