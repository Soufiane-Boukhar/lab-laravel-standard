<?php

namespace App\Repositories;

use App\Models\Stagiaire;

class EloquentStagiaireRepository implements StagiaireRepository {
    public function getAll() {
        return Stagiaire::paginate(2);
    }

    public function find($id) {
        return Stagiaire::find($id);
    }

    public function create(array $data) {
        return Stagiaire::create($data);
    }

    public function update($id, array $data) {
        $stagiaire = Stagiaire::find($id);
        if ($stagiaire) {
            $stagiaire->update($data);
        }
        return $stagiaire;
    }
    

    public function delete($id) {
        return Stagiaire::destroy($id);
    }

    public function search($search) {
        $searchQuery = $search;
    
        $results = Stagiaire::where('name', 'like', '%' . $searchQuery . '%')
            ->orWhere('email', 'like', '%' . $searchQuery . '%')
            ->paginate(2);
    
            return $results;
    }
    
}
