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
    <h2>Inventaire des actions vendus</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Devise</th>
                <th>Prix Achat</th>
                <th>Prix Vente</th>
                <th>Frais</th>
                <th>Quantité</th>
                <th>Pourcentage</th>
                <th>Date Vente</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($actions as $action)
            <tr>
                <td>{{ $action->nom_action }}</td>
                <td>{{ $action->devise }}</td>
                <td>{{ $action->prix_unitaire_achat }}</td>
                <td>{{ $action->prix_unitaire_vente }}</td>
                <td>{{ $action->frais }}</td>
                <td>{{ $action->quantite }}</td>
                <td>{{ number_format($action->pourcentage, 2) }}</td>
                <td>{{ $action->date_vente }}</td>
                <td>
                    <a href="{{ route('actions.edit', $action->id) }}" class="btn btn-primary">Éditer</a>
                    <form action="{{ route('actions.destroy', $action->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette vente d\'action?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">La liste des actions est vide.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Enregistrer une nouvelle vente</h2>

    <form action="{{ route('actions.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="nom_action">Nom:</label>
            <input type="text" class="form-control" id="nom_action" name="nom_action" required>
        </div>

        <div class="form-group">
            <label for="devise">Devise:</label>
            <select class="form-control" id="devise" name="devise" required>
                <option value="CHF" {{ old('devise') == 'CHF' ? 'selected' : '' }}>CHF</option>
                <option value="USD" {{ old('devise') == 'USD' ? 'selected' : '' }}>USD</option>
                <option value="EUR" {{ old('devise') == 'EUR' ? 'selected' : '' }}>EUR</option>
            </select>
        </div>

        <div class="form-group">
            <label for="prix_unitaire_achat">Prix Achat:</label>
            <input type="number" class="form-control" id="prix_unitaire_achat" name="prix_unitaire_achat" required>
        </div>

        <div class="form-group">
            <label for="prix_unitaire_vente">Prix Vente:</label>
            <input type="number" class="form-control" id="prix_unitaire_vente" name="prix_unitaire_vente" required>
        </div>

        <div class="form-group">
            <label for="frais">Frais:</label>
            <input type="number" class="form-control" id="frais" name="frais" required>
        </div>

        <div class="form-group">
            <label for="quantite">Quantité:</label>
            <input type="number" class="form-control" id="quantite" name="quantite" required>
        </div>

        <div class="form-group">
            <label for="date_vente">Date Vente:</label>
            <input type="date" class="form-control" id="date_vente" name="date_vente" value="{{ now()->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer la vente</button>
    </form>
</div>
@endsection