<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class NewsController extends Controller{
    public function index(){
        return response()->json(['data' => News::get()]);
    }
    public function manage(Request $request){
        $data['activePage'] = ['news' => 'news'];
        $data['breadcrumb'] = [
            ['title' => 'news'],
        ];
        $data['addRecord'] = ['href' => route('news.create'), 'class' => 'create_item_btn'];
        if ($request->ajax()) {
            $data  = News::orderBy('id', 'asc')->get();
            return Datatables::of($data)
            ->setRowId(function ($row) {
                return 'tr-'.$row->id;
            })
            ->editColumn('image',function($row){
                return '<a href="'.$row->image_url.'" target="_blank"><img src="'.$row->image_url.'" width="50px" height="50px" style="border-radius: 10% !important;"></a>';
            })
            ->editColumn('user_image',function($row){
                return '<a href="'.$row->user_image_url.'" target="_blank"><img src="'.$row->user_image_url.'" width="50px" height="50px" style="border-radius: 10% !important;"></a>';
            })
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
        return view('admin.news.manage', [
            'data' => $data
        ]);
    }

    public function show($id){
        $new[] = [];
        $item = News::whereId($id)->first();
        $images_new  = collect([]);
        $new['url'] =  $item->image_url;
        $new['name'] = $item->image;
        $images_new->push($new);
        return response()->json($images_new,200);
    }
    public function userImages($id){
        $new[] = [];

        $item = News::whereId($id)->first();
        $images_new  = collect([]);
        $new['url'] =  $item->user_image_url;
        $new['name'] = $item->user_image;
        $images_new->push($new);
        return response()->json($images_new,200);
    }

    public function create(){
        $data['activePage'] = ['news' => 'news'];
        $data['breadcrumb'] = [
            ['title' => "news Management"],
            ['title' => "news"],
            ['title' => 'Add Category'],
        ];
        // return  view('admin.news.create')->with(['data'=>$data, 'news'=> Category::get(), 'languages' => Language::get()]);
        $html= view('admin.news.create')->with(['data'=>$data])->render();
        return response()->json(['status' => true, 'code' => 200, 'message' => 'OK', 'html'=>$html ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'body' => 'required',        
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200,'validator' =>implode("\n",$validator-> messages()-> all()) ],403);
        }
        $item = new News();
        $item->body = $request->body;
        $item->label = $request->label;
        $item->user_name = $request->user_name;
        $item->user_image = $request->user_image;
        $item->save();
        return response()->json(['status' => true, 'code' => 200, 'message' => 'ok','data' => $item]);

    }

    public function edit($id){
        $data['activePage'] = ['news' => 'news'];
        $data['breadcrumb'] = [
            ['title' => "news Management"],
            ['title' => "news"],
            ['title' => 'Edit category'],
        ];
        $item = News::whereId($id)->first();
        $html= view('admin.news.edit')->with(['data'=>$data, 'item' => $item, ])->render();
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
        $item =  News::whereId($id)->first();
        $item->body = $request->body;
        $item->label = $request->label;
        $item->user_name = $request->user_name;
        $item->user_image = $request->user_image;
        $item->save();
        return response()->json(['status' => true, 'code' => 200, 'message' => 'ok','data' => $item]);

    }
    public function addImage(Request $request){
        $id = $request->userId;
        $category = News::whereId($id)->first();
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $category->image !== null ?Storage::disk('public')->delete($category->image): '';
            $uploadedFile = $request->file('file');
            $image = $uploadedFile->store('/', 'public');
            $category->image = $image;
            $category->save();
            return response()->json(['message' => 'ok']);
        }

    }
    public function addImageForUser(Request $request){
        $id = $request->userId;
        $category = News::whereId($id)->first();
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $category->user_image !== null ?Storage::disk('public')->delete($category->user_image): '';
            $uploadedFile = $request->file('file');
            $user_image = $uploadedFile->store('/', 'public');
            $category->user_image = $user_image;
            $category->save();
            return response()->json(['message' => 'ok']);
        }

    }
    public function removeImage(Request $request, $id){
        $category = News::where('image',$id)->first();
        $category->image !== null ?Storage::disk('public')->delete($category->image): '';
        $category->image = null;
        $category->save();
        return response()->json(['message' => 'ok']);
    }
    public function destroy($id){
        $item = News::whereId($id)->delete();
        return response()->json(['message' => 'ok'],200);
    }
}