<?php

namespace App\Http\Controllers;

use App\Repositories\StagiaireRepository;
use Illuminate\Http\Request;

class StagiaireController extends Controller {
    protected $stagiaireRepository;

    public function __construct(StagiaireRepository $stagiaireRepository) {
        $this->stagiaireRepository = $stagiaireRepository;
    }

    public function index() {
        $stagiaires = $this->stagiaireRepository->getAll();
        return view('stagiaire.index', compact('stagiaires'));
    }

    public function create() {
        return view('stagiaire.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $data = $request->all();
        $stagiaire = $this->stagiaireRepository->create($data);

        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire created successfully'); 
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);
    
        $data = $request->all();
    
        $stagiaire = $this->stagiaireRepository->find($id);
    
        if (!$stagiaire) {
            return redirect()->route('stagiaires.edit', $id)->with('error', 'Stagiaire not found');
        }
    
        $this->stagiaireRepository->update($id, $data);
    
        return redirect()->route('stagiaires.edit', $id)->with('success', 'Stagiaire updated successfully');
    }
    
    public function edit($id) {
        $stagiaire = $this->stagiaireRepository->find($id);
        return view('stagiaire.edit', compact('stagiaire'));
    }

    public function delete($id){
        $stagiaire = $this->stagiaireRepository->find($id);
    
        if (!$stagiaire) {
            return redirect()->route('stagiaires.index')->with('error', 'Stagiaire not found');
        }
    
        $this->stagiaireRepository->delete($id);
    
        return redirect()->route('stagiaires.index')->with('success', 'Stagiaire deleted successfully');
    }

    public function searchStagiaire(Request $request) {
        $searchQuery = $request->input('search');
        $results = $this->stagiaireRepository->search($searchQuery);

        return response()->json([
            'data' => $results->items(),
            'links' => $results->links()->toHtml(),
        ]);
    }
    
}
