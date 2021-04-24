<?php

namespace App\Http\Controllers;

use App\Models\Wiki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Wtype;
use App\Models\Wstate;
use Spatie\Permission\Exceptions\UnauthorizedException;


class WikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:wiki-list|wiki-create|wiki-edit|wiki-delete', ['only' => ['index','show']]);
        $this->middleware('permission:wiki-create', ['only' => ['create','store']]);
        $this->middleware('permission:wiki-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:wiki-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myTypes = Wtype::all();
        $myStates = Wstate::all();
        $myUsers = User::all();
        $wikis = Wiki::latest()->paginate(5);
        $data = ['wikis' => $wikis, 'types' => $myTypes, 'states' => $myStates, 'users' => $myUsers];
        return view('wikis.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wikis.create', );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'wtype' => 'required'
        ]);

        Wiki::create($request->all());

        return redirect()->route('wikis.index')
            ->with('success','Wiki created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wiki  $wiki
     * @return \Illuminate\Http\Response
     */
    public function show(Wiki $wiki)
    {
        return view('wikis.show',compact('wiki'));
    }

//    /**
//     * Return Type Description
//     *
//     * @param int $tID
//     * @return array
//     */
//    public function getTypeDesc(string $tID)
//    {
//        $allTypes = Wtype::all();
//        $myType = $allTypes->find($tID)->description;
//        return compact('myType');
//    }
//
//    /**
//     * Return State Description
//     *
//     * @param int $sID
//     * @return array
//     */
//    public function getStateDesc(string $sID)
//    {
//        $allStates = Wstate::all();
//        $myState = $allStates->find($sID)->description;
//        return compact('myState');
//    }
//
//    /**
//     * Return Author Name
//     *
//     * @param int $aID
//     * @return array
//     */
//    public function getAuthorName(string $aID)
//    {
//        $allUsers = User::all();
//        $myAuthor = $allUsers->find($aID)->name;
//        return compact('myAuthor');
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wiki  $wiki
     * @return \Illuminate\Http\Response
     */
    public function edit(Wiki $wiki)
    {
        if (auth()->user()->hasRole('Contributor')){
            if (auth()->user()->id == $wiki->getAttribute('author')){
                return view('wikis.edit',compact('wiki'));
            } else {
                throw UnauthorizedException::forPermissions(['wiki-edit']);
            }
        }
        return view('wikis.edit',compact('wiki'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wiki  $wiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wiki $wiki)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'wtype' => 'required',
            'wstate' => 'required'
        ]);

        $wiki->update($request->all());

        return redirect()->route('wikis.index')
            ->with('success','Wiki updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wiki  $wiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wiki $wiki)
    {
        if (auth()->user()->hasRole('Contributor')){
            if (auth()->user()->id == $wiki->getAttribute('author')){
                $wiki->delete();
            } else {
                throw UnauthorizedException::forPermissions(['wiki-delete']);
            }
        }
        $wiki->delete();

        return redirect()->route('wikis.index')
            ->with('success','Wiki deleted successfully');
    }
}
