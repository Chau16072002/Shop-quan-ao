<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderAddRequest;
use App\Models\Silder;

class SliderAdminController extends Controller
{
    private $slider;
    public function __construct(Slider $slider){
        $this->slider = $slider;
    }

    public function index(){
        return view('admin.slider.all_slider');
    }

    public function create(){
        return view('admin.slider.add_slider');
    }

    public function store(SliderAddRequest $request){
        $dataInsert = [
            'name' => $request->name,
            'description' => $request->description
        ];


    }
}
