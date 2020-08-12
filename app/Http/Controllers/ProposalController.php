<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if user is admin then return all proposals
        if (Auth::user()->role_id == 2) {
            $proposals = Proposal::latest()->paginate(5);

        } else {
            $proposals = Proposal::where('user_id', '=', Auth::id())->orderBy('id', 'DESC')->paginate(5);

        }
        return view('proposal.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proposal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'attachments.*' => 'mimes:doc,pdf,docx,zip,jpg,png,jpeg,gif,ppt|max:500000',
            'attachments' => 'max:4',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput(Input::all());
        }

        if ($request->hasfile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $name = time() . '.' . $file->extension();
                $file->move(public_path() . '/attachment/', $name);
                $names[] = $name;
            }
        }

        $proposal = Proposal::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'is_closed' => 0,
            'user_id' => Auth::id()
        ]);

        if ($names) {
            foreach ($names as $name) {
                DB::table('attachments')->insert([
                    'path' => $name,
                    'proposal_id' => $proposal->id
                ]);
            }
        }
        Session::flash('message', 'تم إضافة المقترح بنجاح');

        return redirect()->route('proposal.index');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Proposal $proposal
     * @return \Illuminate\Http\Response
     */
    public
    function show(Proposal $proposal)
    {
        // if this proposal belong to login user or login user is admin then can show proposal , else return error message
        if (Auth::id() == $proposal->user_id || Auth::user()->role_id == 2) {
            return view('proposal.show');
        } else {
            return redirect()->back()->with('message', 'غير مصرح لك بالدخول هنا');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Proposal $proposal
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Proposal $proposal
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Proposal $proposal
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public
    function destroy(Proposal $proposal)
    {
        if (Auth::user()->role_id == 2) {
            $proposal->delete();
            return redirect()->back()->with('message', 'تم حذف المقترح بنجاح');


        } else {
            return redirect()->back()->with('message', 'غير مصرح لك بالدخول هنا');

        }
    }
}
