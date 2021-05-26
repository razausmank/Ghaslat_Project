<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Package;
use Exception;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    public function create()
    {

        return view('packages.create');
    }

    public function store(PackageRequest $request)
    {
        $validated = $request->validated();

        $image_address = $request->file('image')->store('public/package');
        unset($validated['image']);

        Package::create($validated + [
            'image' => $image_address
        ]);

        return redirect(route('package.index'))->with('success', 'Package successfuly created');
    }

    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    public function update(Package $package, PackageRequest $request)
    {
        $validated = $request->validated();
        $image_address = NULL;
        if ($request->file('image')) {
            $image_address = $request->file('image')->store('public/package');
        }
        unset($validated['image']);
        $package->update($validated  + [
            'image' => $image_address
        ]);

        return redirect(route('package.index'))->with('success', 'Package successfuly updated');
    }

    public function destroy(Package $package)
    {
        try {
            $package->destroy($package->id);
        } catch (Exception $exception) {
            return redirect(route('package.index'))->with('failure', 'Package Cannot be deleted');
        }

        return redirect(route('package.index'))->with('success', 'Package successfuly deleted');
    }
}
