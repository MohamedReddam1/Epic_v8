<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Formation; 
use Illuminate\Http\Request; 
 
class CategoriesController extends Controller 
{ 
    public function getCoursesByCat($category)
    {
        // Your logic to get courses by category
        $courses = Formation::where('categorie', $category)->get();

        return view('coursesByCategories', compact('courses'));
    }
}