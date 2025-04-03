<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade for raw queries

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Validate query parameter
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $request->input('query');

        // Query the companies table
        $results = DB::table('companies')->where('name', 'LIKE', "%$query%")
            ->orWhere('registration_number', 'LIKE', "%$query%")
            ->orWhere('departments', 'LIKE', "%$query%")
            ->get();

        return response()->json($results);
    }
}


?>