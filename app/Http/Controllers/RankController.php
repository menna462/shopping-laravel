<?php

namespace App\Http\Controllers;

use App\Models\Model\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function index()
    {
        $ranks = Rank::all();
        return view("backend.rank", compact('ranks'));
    }
        public function create()
    {
        return view('backend.ranks.create');
    }
    public function destroy(Rank $rank)
{
    $rank->delete();
    return redirect()->route('ranks')->with('message', 'تم حذف الرتبة بنجاح');
}
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'points' => 'required|integer|min:0',
        ]);

        Rank::create($request->all());
        return redirect()->route('ranks')->with('message', 'تمت إضافة الرتبة بنجاح');
    }
     public function edit(Rank $rank)
    {
        return view('backend.ranks.edit', compact('rank'));
    }

    public function update(Request $request, Rank $rank)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'points' => 'required|integer|min:0',

        ]);

        $rank->update($request->all());
        return redirect()->route('ranks')->with('message', 'تم تحديث الرتبة بنجاح');
    }

}
