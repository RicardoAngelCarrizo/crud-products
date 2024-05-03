<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Producto::latest()->paginate(5);
        return view('productos.index', compact('data'))->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $producto = Producto::create([
            'codigo'=>$request->codigo,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio,
            'stock'=>$request->stock,           
        ]);

        return redirect()->route('productos.show',['id' => $producto->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('productos.show',[
            'data' => Producto::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('productos.edit', [
            'data' => Producto::where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Producto::where('id', $id)->update([
            'codigo'=>$request->codigo,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio,
            'stock'=>$request->stock,           
        ]);

        return redirect()->route('productos.show',['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Producto::findOrFail($id)->delete();
        return redirect()->route('productos.index');
    }

    public function listAPI(Request $request)
    {
    //
    $page = '5';
    if ($request->page && !empty($request->page))
    $data = Producto::latest()->paginate();
    $page = $request->page;
    $data = Producto::latest()->paginate($page);

    if ( count($data) == 0 ) {
    return response()->json( ['response' => ['OK'], 'data' => 'No data available' ] );
    }
    return response()->json( ['response' => ['OK'], 'data' => $data ] );
    }


    public function storeAPI(Request $request)
    {
    $validator = Validator::make(
    $request->all(), [
     
    'codigo' => 'required|string',
    'descripcion' => 'required|string',
    'precio' => 'required|string',
    'stock' => 'required|string'],
    );
    if ( $validator->fails() == true ) {
    return response()->json( ['response' => ['Error'], 'data' => 'Faltan campos obligatorios' ] );
    }
    //
    $producto = Producto::create([
    'codigo'=>$request->codigo,
    'descripcion'=>$request->descripcion,
    'precio'=>$request->precio,
    'stock'=>$request->stock,
    
    ]);
    return response()->json( ['response' => ['OK'], 'data' => ['id' =>$producto->id] ] );
    }

    //--
    public function showAPI($id)
    {
    //  
    $data = Producto::find($id);
   
    if ( !$data ) {
    return response()->json( ['response' => ['OK'], 'data' => 'No data available' ] );
    }
   
    return response()->json( ['response' => ['OK'], 'data' => $data ] );
   
    }

    //--
    public function updateAPI(Request $request, $id)
    {
    $validator = Validator::make(
    $request->all(), [
    'codigo' => 'required|string',
    'descripcion' => 'required|string',
    'precio' => 'required|string',
    'stock' => 'required|string'],
    );
    if ( $validator->fails() == true ) {
    return response()->json( ['response' => ['Error'], 'data' => 'Faltan campos obligatorios' ] );
    }
    //
    Producto::where('id',$id)->update([
    'codigo'=>$request->codigo,
    'descripcion'=>$request->descripcion,
    'precio'=>$request->precio,
    'stock'=>$request->stock,
    
    ]);
    return response()->json( ['response' => ['OK'], 'data' => ['id' => $id] ] );
    }

    //--
    public function destroyAPI($id)
    {
    //
    Producto::findOrFail($id)->delete();
    return response()->json( ['response' => ['OK'], 'data' => ['id' => $id] ] );
    }


}








