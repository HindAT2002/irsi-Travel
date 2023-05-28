<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Trip;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $trips=Trip::all();
       return view('admin.Trip.index')->with('trips',$trips);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       $trips=Trip::all();
       return view('admin.Trip.create');
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
        'nbr_jour' => 'required|numeric',
        'image1' => 'required|image',
        'image2' => 'image',
        'image3' => 'image',
        'image4' => 'image',
        'localisation' => 'required',
        'title' => 'required',
        'description' => 'required',
        'date',
        'prix' => 'required|numeric',
    ]);

    // Upload and store the images
    $imagePaths = [];
    for ($i = 1; $i <= 4; $i++) {
        if ($request->hasFile('image' . $i)) {
            $file = $request->file('image' . $i);
            $uniqueFileName = uniqid() . '_' . $file->getClientOriginalName();
            $imagePath = $file->storeAs('/img/blog', $uniqueFileName);
            $imagePaths['image' . $i] = $imagePath;
        }
    }

    // Create the trip record
    $trip = new Trip();
    $trip->nbr_jour = $request->input('nbr_jour');
    $trip->localisation = $request->input('localisation');
    $trip->title = $request->input('title');
    $trip->description = $request->input('description');
    $trip->date = $request->input('date');
    $trip->prix = $request->input('prix');
    $trip->fill($imagePaths);
    $trip->save();

    $trips = Trip::all();

    return view('admin.Trip.index')->with([
        'success' => 'Trip added successfully',
        'trips' => $trips
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
        $trip = Trip::findOrFail($id);
        return view('admin.Trip.show')->with('trip', $trip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    // Récupérer le voyage à éditer en fonction de son ID
    $trip = Trip::findOrFail($id);

    // Passer le voyage à la vue pour l'affichage du formulaire d'édition
    return view('admin.Trip.edit')->with('trip', $trip);



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
        'nbr_jour' => 'required|numeric',
        'image1' => 'image',
        'image2' => 'image',
        'image3' => 'image',
        'image4' => 'image',
        'localisation' => 'required',
        'title' => 'required',
        'description' => 'required',
        'date',
        'prix' => 'required|numeric',
    ]);

    // Récupérer le voyage à mettre à jour en fonction de son ID
    $trip = Trip::findOrFail($id);

    // Upload and store the images
    $imagePaths = [];
    for ($i = 1; $i <= 4; $i++) {
        if ($request->hasFile('image' . $i)) {
            $file = $request->file('image' . $i);
            $uniqueFileName = uniqid() . '_' . $file->getClientOriginalName();
            $imagePath = $file->storeAs('/img/blog', $uniqueFileName);
            $imagePaths['image' . $i] = $imagePath;
        }
    }

    // Mettre à jour les propriétés du voyage avec les données du formulaire
    $trip->nbr_jour = $request->input('nbr_jour');
    $trip->localisation = $request->input('localisation');
    $trip->title = $request->input('title');
    $trip->description = $request->input('description');
    $trip->date = $request->input('date');
    $trip->prix = $request->input('prix');
    $trip->fill($imagePaths);
    $trip->save();
    
    $trips = Trip::all();

    // Rediriger vers la page de détails du voyage ou vers toute autre page souhaitée
    return view('admin.Trip.index')->with([
                'success'=> 'Le voyage a été mis à jour avec succès.',
                    'trips'=> $trips]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function destroy($id)
        {
            // Récupérer le voyage à supprimer en fonction de son ID
            $trip = Trip::findOrFail($id);

            // Supprimer les images associées au voyage
            foreach ($trip->getAttributes() as $key => $value) {
                if (str_contains($key, 'image')) {
                    $filePath = public_path('img/blog/' . $value);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            // Supprimer le voyage de la base de données
            $trip->delete();

            // Rediriger vers la liste des vtoyages ou vers toute autre page souhaitée
            return view('admin.Trip.index')->with('success', 'Le voyage a été supprimé avec succès.');
        }

}
