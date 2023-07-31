<?php

namespace App\Http\Controllers;

use App\Http\Requests\StreetRequest;
use App\Street;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;

class StreetController extends Controller
{
    public function index()
    {
        $streets = Street::all();
        return view('streets.index', compact('streets'));
    }

    public function create() {
        return view('streets.create');
    }


    public function store(StreetRequest $request) {
        $street = new Street($request->all());
        if ($street->save()) {
            return Redirect::route('street.index')->with('success', '성공적으로 추가되였습니다.');
        }
        return Redirect::route('street.create')->withInput()->with('error', '자료보관중 오유가 발생하였습니다. 다시한번 해보십시오.');
    }


    public function edit($id)
    {
        try {
            $street = Street::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return Redirect::route('street.index')->with('error', '자료를 찾지 못하였습니다.');
        }

        // Show the page
        return view('streets.edit', compact('street'));
    }

    public function update($id, StreetRequest $request) {
        $street = Street::find($id);
        $street->fill($request->all());

        if ($street->save()) {
            return Redirect::route('street.index')->with('success', '성공적으로 보관되였습니다.');
        }
        return Redirect::route('street.create')->withInput()->with('error', '자료보관중 오유가 발생하였습니다. 다시한번 해보십시오.');

    }

    public function getModalDelete($id = null)
    {
        $model = 'groups';
        $confirm_route = $error = null;
        $title = 'street Delete';
        try {
            // Get group information
            $street = Street::findOrFail($id);
            $confirm_route = route('street.delete', ['id' => $street->id]);
            return view('common.modal_confirmation', compact('error', 'model', 'confirm_route', 'title'));
        } catch (ModelNotFoundException $e) {
            $error = '자료를 찾지 못하였습니다.';
            return view('common.modal_confirmation', compact('error', 'model', 'confirm_route', 'title'));
        }
    }


    public function destroy($id)
    {
        try {
            $street = Street::findOrFail($id);
            $street->delete();
            return Redirect::route('street.index')->with('error', '성공적으로 삭제되였습니다.');
        } catch (ModelNotFoundException $e) {
            return Redirect::route('street.index')->with('error', '자료를 찾지 못하였습니다.');
        }
    }
}
