@extends('layouts.app')

@section('content')

<div class="container">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif


    <h2>Correction d'une vente</h2>

    <form action="{{ route('actions.update', $action->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom_action">Nom:</label>
            <input type="text" class="form-control" id="nom_action" name="nom_action" value="{{ old('nom_action', $action->nom_action) }}" required>
        </div>

        <div class="form-group">
            <label for="devise">Devise:</label>
            <select class="form-control" id="devise" name="devise" required>
                <option value="CHF" {{ old('devise', $action->devise) == 'CHF' ? 'selected' : '' }}>CHF</option>
                <option value="USD" {{ old('devise', $action->devise) == 'USD' ? 'selected' : '' }}>USD</option>
                <option value="EUR" {{ old('devise', $action->devise) == 'EUR' ? 'selected' : '' }}>EUR</option>
            </select>
        </div>

        <div class="form-group">
            <label for="prix_unitaire_achat">Prix Achat:</label>
            <input type="number" class="form-control" id="prix_unitaire_achat" name="prix_unitaire_achat" value="{{ old('prix_unitaire_achat', $action->prix_unitaire_achat) }}" required>
        </div>

        <div class="form-group">
            <label for="prix_unitaire_vente">Prix Vente:</label>
            <input type="number" class="form-control" id="prix_unitaire_vente" name="prix_unitaire_vente" value="{{ old('prix_unitaire_vente', $action->prix_unitaire_vente) }}" required>
        </div>

        <div class="form-group">
            <label for="frais">Frais:</label>
            <input type="number" class="form-control" id="frais" name="frais" value="{{ old('frais', $action->frais) }}" required>
        </div>

        <div class="form-group">
            <label for="quantite">Quantité:</label>
            <input type="number" class="form-control" id="quantite" name="quantite" value="{{ old('quantite', $action->quantite) }}" required>
        </div>

        <div class="form-group">
            <label for="date_vente">Date Vente:</label>
            <input type="date" class="form-control" id="date_vente" name="date_vente" value="{{ old('date_vente', $action->date_vente) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
</div>
@endsection