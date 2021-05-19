<?php

namespace App\Http\Controllers;

use App\Models\EntityType;
use Illuminate\Http\Request;

class EntityTypeController extends Controller
{
    public function index()
    {
        $entity_types = EntityType::all() ;
        return view('entity_type.index' , compact( 'entity_types' ) );
    }

    public function create()
    {
        return view('entity_type.create');
    }

    public function store( Request $request )
    {
        $validated = $request->validate([
            'name' => ['required'],
            'description' => ['nullable']
        ]);

        EntityType::create( $validated );

        return redirect( route('entitytype.index') )->with('success', 'Entity Type successfuly created');

    }

    public function edit( EntityType $entitytype )
    {
        return view('entity_type.edit' , compact( 'entitytype' ) );
    }

    public function update( EntityType $entitytype , Request $request )
    {
        $validated = $request->validate([
            'name' => ['required'],
            'description' => ['nullable']
        ]);

        $entitytype->update( $validated );

        return redirect( route('entitytype.index') )->with('success', 'Entity Type successfuly updated');

    }

    public function destroy( EntityType $entitytype )
    {
        try{
            $entitytype->destroy($entitytype->id);
        } catch( Exception $exception ) {
            return redirect(route('entitytype.index'))->with('failure', 'Entity Type Cannot be deleted');
        }

        return redirect( route('entitytype.index') )->with('success', 'Entity Type successfuly deleted');
    }
}
