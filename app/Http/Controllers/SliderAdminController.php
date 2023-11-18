<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\StorageImageTrait;

class SliderAdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if ($admin_id){
           return redirect('dashboard');
        }else {
            return redirect('admin')->send();
        }
    }
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider){
        $this->slider = $slider;
    }

    public function index(){
        $this->AuthLogin();
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.all_slider', compact('sliders'));
    }

    public function create(){
        $this->AuthLogin();
        return view('admin.slider.add_slider');
    }

    public function store(SliderAddRequest $request){
        $this->AuthLogin();
        try {
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description,
                'slider_status' => $request->slider_status
            ];

            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');

            if(!empty($dataImageSlider)){
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }

            $this->slider->create($dataInsert);
            return redirect()->route('slider_index');
        } catch (\Exception $ex) {
            Log::error("Loi: " . $ex->getMessage() . "--Line: " . $ex->getLine());
        }

    }

    public function unactive_slider($id) {
        $this->AuthLogin();
        $data = $this->slider->where('id', $id)->update(['sliderphp_status'=>1]);
        session()->put('message', 'Hiển thị slider thành công');
        return redirect()->route('slider_index');

    }

    public function active_slider($id) {
        $this->AuthLogin();
        $data = $this->slider->where('id', $id)->update(['slider_status'=>0]);
        session()->put('message', 'Ẩn slider thành công');
        return redirect()->route('slider_index');
    }
    public function delete($id){
        $this->slider->find($id)->delete();
        session()->flash('message', 'Xóa slider sản phẩm thành công !!!');
        return redirect()->route('slider_index');
    }
}
