<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;

class ActionController extends Controller
{
    // Méthode pour afficher la liste des ventes d'actions
    public function index()
    {
        try {
            $actions = Action::all();

            // Calcul du pourcentage de gain ou de perte pour chaque vente d'action
            foreach ($actions as $action) {
                $action->pourcentage = $action->calculerPourcentage();
            }

            return view('actions.index', compact('actions'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }

    // Méthode pour afficher le formulaire de création d'une vente d'action
    public function create()
    {
        return view('actions.create');
    }

    // Méthode pour enregistrer une vente d'action (Créer la vente)
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nom_action' => 'required|string',
                'devise' => 'required|in:CHF,USD,EUR',
                'prix_unitaire_achat' => 'required|numeric|between:0.01,999999.99',
                'prix_unitaire_vente' => 'required|numeric|between:0.01,999999.99',
                'frais' => 'required|numeric|max:999999.99',
                'quantite' => 'required|integer|min:1',
                'date_vente' => 'required|date',
            ]);

            Action::create($validatedData);

            return redirect()->route('actions.index')->with('success', 'Vente d\'action enregistrée avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }

    // Méthode pour afficher le formulaire d'édition d'une vente d'action
    public function edit($id)
    {
        try {
            $action = Action::findOrFail($id);
            return view('actions.edit', compact('action'));
        } catch (\Exception $e) {
            return redirect()->route('actions.index')->with('error', 'Action non trouvée.');
        }
    }


    // Méthode pour mettre à jour une vente d'action (edit)
    public function update(Request $request, $id)
    {
        try {
            $action = Action::findOrFail($id);

            $validatedData = $request->validate([
                'nom_action' => 'required|string',
                'devise' => 'required|in:CHF,USD,EUR',
                'prix_unitaire_achat' => 'required|numeric|between:0.01,999999.99',
                'prix_unitaire_vente' => 'required|numeric|between:0.01,999999.99',
                'frais' => 'required|numeric|max:999999.99',
                'quantite' => 'required|integer|min:1',
                'date_vente' => 'required|date',
            ]);

            $action->update($validatedData);

            return redirect()->route('actions.index')->with('success', 'Vente d\'action mise à jour avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }

    // Méthode pour supprimer une vente d'action (bouton supprimer)
    public function destroy($id)
    {
        try {
            $action = Action::findOrFail($id);
            $action->delete();
            return redirect()->route('actions.index')->with('success', 'Vente d\'action supprimée avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite. Veuillez réessayer.');
        }
    }
}
