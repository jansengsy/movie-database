<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Get all movies
    public function index() {

        // If I had more time I would have added pagination using the paginate(x) method
        $movie = Movie::get();
        return response()->json($movie, 201);
    }

    // Add new movie
    public function add(Request $request) {
        // Validate request
        $this->validate($request, [
            'title' => 'required|max:255',
            'year' => 'required|integer|between:1800,2100',
            'director' => 'required|max:255',
            'description' => 'required'
        ]);

        // Store movie
        $movie = Movie::create($request->all());
        return response()->json($movie, 201);
    }

    // Edit movie
    public function edit($id) {
        $movie = Movie::findOrFail($id);
        return response()->json($movie);
    }

    // Update movie
    public function update(Request $request, $id) {
        // Given more time I would have created better year validation and a custom request
        // Validate request
        $this->validate($request, [
            'title' => 'required|max:255',
            'year' => 'required|integer|between:1800,2100',
            'director' => 'required|max:255',
            'description' => 'required'
        ]);

        // Update specified movie
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return response()->json($movie, 200);
    }

    // Delete movie
    public function delete($id) {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return response()->json($movie, 200);
    }
}
