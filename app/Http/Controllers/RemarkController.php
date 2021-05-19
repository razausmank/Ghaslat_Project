<?php

namespace App\Http\Controllers;

use App\Models\EntityType;
use App\Models\Remark;
use Exception;
use Illuminate\Http\Request;

class RemarkController extends Controller
{
    public function index()
    {
        $remarks = Remark::all() ;
        return view('remarks.index' , compact( 'remarks' ) );
    }

    public function create()
    {
        $entitytypes = EntityType::all();
        return view('remarks.create' , compact('entitytypes') );
    }

    public function store( Request $request )
    {
        $validated = $request->validate([
            'description' => ['required'],
            'entity_type_id' => ['required' , 'exists:entity_types,id'],
            'entity_id' => ['required']
        ]);

        Remark::create( $validated );

        return redirect( route('remark.index') )->with('success', 'Remark successfuly created');

    }

    public function edit( Remark $remark )
    {
        $entitytypes = EntityType::all();

        return view('remarks.edit' , compact( 'remark', 'entitytypes' ) );
    }

    public function update( Remark $remark , Request $request )
    {
        $validated = $request->validate([
            'description' => ['required'],
            'entity_type_id' => ['required' , 'exists:entity_types,id'],
            'entity_id' => ['required']
        ]);

        $remark->update( $validated );

        return redirect( route('remark.index') )->with('success', 'Remark successfuly updated');

    }

    public function destroy( Remark $remark )
    {
        try{
            $remark->destroy($remark->id);
        } catch( Exception $exception ) {
            return redirect(route('remark.index'))->with('failure', 'Remark Cannot be deleted');
        }

        return redirect( route('remark.index') )->with('success', 'Remark successfuly deleted');
    }
}
