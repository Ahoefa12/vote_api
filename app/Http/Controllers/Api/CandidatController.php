<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $candidats = Candidat::all();
            return response()->json([
                'success' => true,
                'data' => $candidats
            ], 200);
          

        } catch (\Throwable $th) {
            return response()->json([
               'success' => false,
               'message' => 'Erreur lors de la récupération des candidats'  . $th->getMessage(),
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       try {
           $data = $request->validate([
            "lastName" => "required|string|min:3",
            "firstName" => "required|string|min:3",
            "nationality" => "required|string",
            "age" => "required|integer|min:18",
            "weight" => "nullable",
            "height" => "nullable",
            "shortDescription" => "nullable",
            "fullDescription" => "nullable",
            "profilePhoto" => "nullable",
           ]);

           $candidat = Candidat::create($data);
           return response()->json([
            'success' => true,
            'message' => 'Candidat crée avec succès',
            'data' => $candidat,
           ], 200);

       } catch (\Throwable $th) {
        return response()->json([
            'success' => false,
            'message' => 'Erreur lors de la création du candidat ',
        ], 400);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $candidat = Candidat::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $candidat,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Candidat non trouvé' .$th->getMessage(),
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         try {
           $data = $request->validate([
            "lastName" => "required|string|min:3",
            "firstName" => "required|string|min:3",
            "nationality" => "required|string",
            "age" => "required|integer|min:18",
            "weight" => "nullable",
            "height" => "nullable",
            "shortDescription" => "nullable",
            "fullDescription" => "nullable",
            "profilePhoto" => "nullable",
           ]);

           $candidat = Candidat::findOrFail($id)->update($data);
           return response()->json([
            'success' => true,
            'message' => 'Candidat modifié avec succès',
            'data' => $candidat,
           ], 200);

       } catch (\Throwable $th) {
        return response()->json([
            'success' => false,
            'message' => 'Erreur lors de la modification du candidat ' . $th->getMessage(),
        ], 400);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Candidat::findOrFail($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Candidat supprimé avec succès',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erreur lors de la suppression' .$th->getMessage(),
            ]);
        }
    }
}
