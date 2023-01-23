<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ContactUsController extends Controller{
    public function manage(Request $request){
        $data['activePage'] = ['contact_us' => 'contact_us'];
        $data['breadcrumb'] = [
            ['title' => 'contact_us'],
        ];
        // $data['addRecord'] = ['href' => route('contact_us.create'), 'class' => 'create_item_btn'];
        if ($request->ajax()) {
            $data  = ContactUs::orderBy('id', 'asc')->get();
            return Datatables::of($data)
            ->setRowId(function ($row) {
                return 'tr-'.$row->id;
            })
            ->escapeColumns([])
            ->addColumn('index', function($row){
                $btn =view('admin.core.table_index')->with(['row'=>$row])->render();
                return $btn;
            })
            ->editColumn('message',function($row){
                $btn ='<a data-id='. $row->id. ' class="btn btn-sm btn-primary edit_item_btn" >message</a>';
                return $btn;
            })
            // ->addColumn('action', function ($item) {
            //     $btn = '';
            //     $btn .= '<a data-id='. $item->id. ' class="btn btn-sm btn-clean btn-icon edit_item_btn" > <i class="la la-edit"></i></a>';
            //     $btn .= '<a data-action="destroy" data-id='. $item->id. 'class="btn btn-xs red p-2  tooltips" ><i class="fa fa-times" aria-hidden="true"></i></a>';
            //     return $btn;
            // })
            ->rawColumns(['action','index'])
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name') != null) {
                    $query->where('name', 'like', "%{$request->get('name')}%");
                }
            })
            ->make(true);
        }
        return view('admin.contact_us.manage', [
            'data' => $data
        ]);
    }
    public function show($id){
        $item = ContactUs::whereId($id)->first();
        return response()->json(['item' => $item,'code'=> 200]);
    }

    public function store(Request $request){
        if(!$request->name){
            return response()->json(['message' => _('name is required')],403);
        }
        if(!$request->email){
            return response()->json(['message' => _('email is required')],403);
        }
        if(!$request->subject){
            return response()->json(['message' => _('subject is required')],403);
        }
        if(!$request->message){
            return response()->json(['message' => _('message is required')],403);
        }
        if(!$request->mobile_no){
            return response()->json(['message' => _('Phone Number is required')],403);
        }
        $message = new ContactUs();
        $message->name = $request->name; 
        $message->email = $request->email; 
        $message->mobile_no = $request->mobile_no; 
        $message->message = $request->message; 
        $message->subject = $request->subject; 
        $message->save();
        return response()->json(['message' => 'ok']);

    }
}
