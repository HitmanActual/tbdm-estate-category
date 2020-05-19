<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\EstateCategory;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class EstateCategoryController  extends Controller
{
    use ApiResponser;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estateCategories = EstateCategory::all();
        
        return $this->successResponse($estateCategories);
      
    }

    /**
     * Create one new Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[

            'parent_id'=>'required|integer',
            'category_name'=>'required',
            
           
        ]);
       
        $estateCategory = EstateCategory::create($request->all());          
        return $this->successResponse($estateCategory,Response::HTTP_CREATED);
       
    }

    /**
     * get one Clinic
     *
     * @return Illuminate\Http\Response
     */
    public function show($estateCategory)
    {
        //
        $estateCategory= EstateCategory::findOrFail($estateCategory);
        return $this->successResponse($estateCategory);
        
    }

    /**
     * update an existing one Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$estateCategory)
    {

        $this->validate($request,[
           
            
            'parent_id'=>'integer',
            'category_name'=>'string',
            
        ]);
        $estateCategory = EstateCategory::findOrFail($estateCategory);
        $estateCategory->fill($request->all());

        
        if($estateCategory->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $estateCategory->save();
        return $this->successResponse($estateCategory);
    }

     /**
     * remove an existing one clinic
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($estateCategory)
    {
        $estateCategory = EstateCategory::findOrFail($estateCategory);
        $estateCategory->delete();
        return $this->successResponse($estateCategory);
      
    }

}
