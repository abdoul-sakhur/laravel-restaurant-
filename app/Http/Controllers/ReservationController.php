<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\reservation;

class ReservationController extends Controller
{
    public function take_reservation(ReservationRequest $request)
    {
        $reservation = reservation::create($request->validated());

        return to_route('accueil')->with('success', 'Votre reservation a ete prise en compte ! ');
    }

    public function show_reservation()
    {
        $reservation = reservation::query()->get();
        // dd($reservation);

        return view('admin.reservation', [
            'reservations' => $reservation,
        ]);
    }

    public function update(ReservationRequest $request, reservation $reservation)
    {
        $reservation->update($request->validated());

        return to_route('voir_reservation')->with('success', 'Votre reservation a ete approuve ! ');
    }

    public function delete_reservation(reservation $reservation)
    {
        $reservation->delete();

        return to_route('voir_reservation')->with('success', 'la reservation a ete surrpime avec success !');
    }
}
