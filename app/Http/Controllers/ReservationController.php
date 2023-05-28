<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Trip;
use App\Models\User;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $reservations = Reservation::all();
        $users = User::all();
        return view('admin.Reservation.index')->with('reservations', $reservations)->with('users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trips = Trip::all();
        $users = User::all();
        return view('admin.Reservation.create')->with([
            'trips' => $trips,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_trip' => 'required',
            'id_user' => 'required',
            'nbr_place' => 'required|numeric',
            'nbr_enfant' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $reservation = new Reservation();
        $reservation->id_trip = $request->input('id_trip');
        $reservation->id_user = $request->input('id_user');
        $reservation->nbr_place = $request->input('nbr_place');
        $reservation->nbr_enfant = $request->input('nbr_enfant');
        $reservation->date = $request->input('date');
        $reservation->save();

        $reservations = Reservation::all();

        return view('admin.Reservation.index')->with([
            'success' => 'Reservation added successfully',
            'reservations' => $reservations
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.Reservation.show')->with('reservation', $reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $trips = Trip::all();
        $users = User::all();
        return view('admin.Reservation.edit')->with([
            'reservation' => $reservation,
            'trips' => $trips,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_trip' => 'required',
            'id_user' => 'required',
            'nbr_place' => 'required|numeric',
            'nbr_enfant' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->id_trip = $request->input('id_trip');
        $reservation->id_user = $request->input('id_user');
        $reservation->nbr_place = $request->input('nbr_place');
        $reservation->nbr_enfant = $request->input('nbr_enfant');
        $reservation->date = $request->input('date');
        $reservation->save();

        $reservations = Reservation::all();

        return view('admin.Reservation.index')->with([
            'success' => 'Reservation updated successfully',
            'reservations' => $reservations
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        $reservations = Reservation::all();

        return view('admin.Reservation.index')->with([
            'success' => 'Reservation deleted successfully',
            'reservations' => $reservations
        ]);
    }
}
