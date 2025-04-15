<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function index() {


        $investors = Investor::orderBy('last_name')->paginate(10);

        return inertia('Investor/Index',['investors' => $investors]);
    }

    public function create(){
        return inertia('Investor/Add');
    }

    public function store(Request $req){

        $validated = $req->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'investment_type' => 'required',
        ]);

        Investor::create($validated);

        return redirect('/investors');
    }
}
