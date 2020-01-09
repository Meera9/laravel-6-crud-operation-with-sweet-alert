<?php

namespace App\Http\Controllers\Admin;

use App\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use Session;
use Mail;
use RealRashid\SweetAlert\Facades\Alert;


class PortfolioController extends Controller
{
    private $data = array(
        'route' => 'portfolio.',
        'title' => 'Portfolio',
        'menu' => 'Portfolio',
        'breadcrumbs' => 'Home',
    );

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.portfolio.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.portfolio.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $post=$request->all();

            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);



            if ($request->has('image')) {
                $imageName = time()."_".$request->image->getClientOriginalName();
                // dd($imageName);
                $request->image->move(public_path('uploads/portfolio'), $imageName);
                $post['image'] = $imageName;
            }else{
                Session::flash('error','Image field is required');
                return redirect()->route('portfolio.index');
            }
            
            $CreateDetails = array(
                'name' => $post['name'],
                'description' => $post['description'],
                'image' => $post['image'],
            );
            Portfolio::create($CreateDetails);
            Alert::success('Portfolio Details', 'added successfully');
            return redirect()->route('portfolio.index');
        }
        catch (\Exception $e ) {
          Alert::error('Oops something went wrong', $e->getMessage());
          return redirect()->route('portfolio.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_edit = Portfolio::find($id);
        return view('admin.portfolio.edit',$this->data,compact('data_edit')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        try{
            $post=$request->all();

            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            if ($request->has('image')) {
                $imageName = time()."_".$request->image->getClientOriginalName();
                $request->image->move(public_path('uploads/portfolio'), $imageName);
                $post['image'] = $imageName;
            }
            
            if(!empty($post['image'])){
                $UpdateDetails = array(
                    'name' => $post['name'],
                    'description' => $post['description'],
                    'image' => $post['image'],
                );
            }else{
                $UpdateDetails = array(
                    'name' => $post['name'],
                    'description' => $post['description'],
                );
            }
            Portfolio::where('id',$id)->update($UpdateDetails);
            Alert::success('Portfolio Details', 'edited successfully');
            return redirect()->route('portfolio.index');
        }
        catch (\Exception $e ) {
          Alert::error('Oops something went wrong', $e->getMessage());
          return redirect()->route('portfolio.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try{
        $portfolio = Portfolio::find($id);
        if(!empty($portfolio)){
            Portfolio::where('id',$id)->delete();
            Alert::success('Portfolio Details', 'Deleted successfully');
            return redirect()->route('portfolio.index');
        }else{
          Alert::error('Oops something went wrong', 'please try again');
          return redirect()->route('portfolio.index');
        }
      }catch (\Exception $e ) {
          Alert::error('Oops something went wrong', $e->getMessage());
          return redirect()->route('portfolio.index');
      }
    
    }

    //ajax response
    public function ajaxData(Request $request)
    {   
        $query = Portfolio::select('*');
        return Datatables::of($query)->addColumn('action', function ($page) {
        return " <a href=".route($this->data['route'].'edit',$page->id)." class='btn btn-info' title='edit' data-original-title='View'><span style='color:#fff;font-size:15px;font-weight:800'>&#9998;</span></a>&nbsp;
            <a href='javascript:void(0);' onclick='deleteUser(\"".route('portfolio.delete',$page->id)."\")' class ='btn btn-danger'  title='delete'><spna
            i class='fa fa-trash'></span></a>";
        })->make(true);   
    }

}
