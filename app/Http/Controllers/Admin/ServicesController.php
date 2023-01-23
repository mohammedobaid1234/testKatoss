<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class ServicesController extends Controller{
    public function index(){
        return response()->json(['data' => Service::get()]);
    }
    public function manage(Request $request){
        $data['activePage'] = ['services' => 'services'];
        $data['breadcrumb'] = [
            ['title' => 'services'],
        ];
        $data['addRecord'] = ['href' => route('services.create'), 'class' => 'create_item_btn'];
        if ($request->ajax()) {
            $data  = Service::orderBy('id', 'asc')->get();
            return Datatables::of($data)
            ->setRowId(function ($row) {
                return 'tr-'.$row->id;
            })
            // ->editColumn('image',function($row){
            //     return '<a href="'.$row->image_url.'" target="_blank"><img src="'.$row->image_url.'" width="50px" height="50px" style="border-radius: 10% !important;"></a>';
            // })
            ->escapeColumns([])
            ->addColumn('index', function($row){
                $btn =view('admin.core.table_index')->with(['row'=>$row])->render();
                return $btn;
            })
            ->addColumn('action', function ($item) {
                $btn = '';
                $btn .= '<a data-id='. $item->id. ' class="btn btn-sm btn-clean btn-icon edit_item_btn" > <i class="la la-edit"></i></a>';
                $btn .= '<a data-action="destroy" data-id='. $item->id. 'class="btn btn-xs red p-2  tooltips" ><i class="fa fa-times" aria-hidden="true"></i></a>';
                return $btn;
            })->rawColumns(['action','index'])
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name') != null) {
                    $query->where('name', 'like', "%{$request->get('name')}%");
                }
                if ($request->has('created_at') && $request->get('created_at') != null) {
                   $query->WhereCreatedAt($request->get('created_at')); 
                }
            })
            ->make(true);
        }
        return view('admin.services.manage', [
            'data' => $data
        ]);
    }

    public function show($id){
        $item = Service::whereId($id)->first();
        $images_new  = collect([]);
        $new['url'] =  $item->image_url;
        $new['name'] = $item->image;
        $images_new->push($new);
        return response()->json($images_new,200);
    }

    public function create(){
        $data['activePage'] = ['services' => 'services'];
        $data['breadcrumb'] = [
            ['title' => "services Management"],
            ['title' => "services"],
            ['title' => 'Add Category'],
        ];
        // return  view('admin.services.create')->with(['data'=>$data, 'services'=> Category::get(), 'languages' => Language::get()]);
        $html= view('admin.services.create')->with(['data'=>$data])->render();
        return response()->json(['status' => true, 'code' => 200, 'message' => 'OK', 'html'=>$html ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'body' => 'required',        
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200,'validator' =>implode("\n",$validator-> messages()-> all()) ],403);
        }
        $item = new Service();
        $item->body = $request->body;
        $item->label = $request->label;
        $item->save();
        return response()->json(['status' => true, 'code' => 200, 'message' => 'ok','data' => $item]);

    }

    public function edit($id){
        $data['activePage'] = ['services' => 'services'];
        $data['breadcrumb'] = [
            ['title' => "services Management"],
            ['title' => "services"],
            ['title' => 'Edit category'],
        ];
        $item = Service::whereId($id)->first();
        $html= view('admin.services.edit')->with(['data'=>$data, 'item' => $item, ])->render();
        return response()->json(['status' => true, 'code' => 200, 'message' => 'OK','item' =>$item ,'html'=>$html ]);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'label' => 'required',        
            'body' => 'required',        
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200,'validator' =>implode("\n",$validator-> messages()-> all()) ],403);
        }
        $item =  Service::whereId($id)->first();
        $item->body = $request->body;
        $item->label = $request->label;
        $item->save();
        return response()->json(['status' => true, 'code' => 200, 'message' => 'ok','data' => $item]);

    }
    public function addImage(Request $request){
        $id = $request->userId;
        $category = Service::whereId($id)->first();
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $category->image !== null ?Storage::disk('public')->delete($category->image): '';
            $uploadedFile = $request->file('file');
            $image = $uploadedFile->store('/', 'public');
            $category->image = $image;
            $category->save();
            return response()->json(['message' => 'ok']);
        }

    }
    public function removeImage(Request $request, $id){
        $category = Service::where('image',$id)->first();
        $category->image !== null ?Storage::disk('public')->delete($category->image): '';
        $category->image = null;
        $category->save();
        return response()->json(['message' => 'ok']);
    }
    public function destroy($id){
        $item = Service::whereId($id)->delete();
        return response()->json(['message' => 'ok'],200);
    }
}
