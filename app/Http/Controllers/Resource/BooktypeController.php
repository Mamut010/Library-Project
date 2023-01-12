<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Booktype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooktypeController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Automatically invoked the policy registered for Book class each time a corresponding method is called
        $this->authorizeResource(Booktype::class, 'booktype');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booktypes = Booktype::orderBy('name', 'ASC')
                             ->paginate(5);

        return view('resources.booktypes.booktypes-list', ['booktypes' => $booktypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resources.booktypes.booktypes-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        if(!DB::table('booktypes')->where('name', $name)->first()) {
            DB::table('booktypes')->insert([
                'name' => $name,
                'description' => $request->input('description'),
            ]);

//            return redirect()->route('booktypes.index');
            return redirect()->route('booktypes.index');
        } else {
//            return redirect()->route('booktypes.create');
            return redirect()->route('booktypes.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booktype  $booktype
     * @return \Illuminate\Http\Response
     */
    public function show(Booktype $booktype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booktype  $booktype
     * @return \Illuminate\Http\Response
     */
    public function edit(Booktype $booktype)
    {
        return view('resources.booktypes.booktypes-manage')->with('booktype', $booktype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booktype  $booktype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booktype $booktype)
    {
        DB::table('booktypes')->where('id', $booktype->id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

//        return redirect()->route('booktypes.index');
        return redirect()->route('booktypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booktype  $booktype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booktype $booktype)
    {
        $booktype->delete();

//        return redirect()->route('booktypes.index');
        return redirect()->route('booktypes.index');
    }

    /**
     * Show the confirm page.
     *
     * @param  \App\Models\Booktype $booktype
     * @return \Illuminate\Http\Response
     */
    public function confirm(Booktype $booktype)
    {
        return view('resources.booktypes.booktypes-delete')
            ->with('booktype', $booktype);
    }
}
