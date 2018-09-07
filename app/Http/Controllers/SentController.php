<?php
namespace App\Http\Controllers;
use App\Sent;
use Illuminate\Http\Request;
use App\Repositories\Sent\SentInterface;
class SentController extends Controller
{
  protected $sent;

  public function __construct(SentInterface $sent){
    $this->sent = $sent;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sent  $sent
     * @return \Illuminate\Http\Response
     */
    public function show(Sent $sent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sent  $sent
     * @return \Illuminate\Http\Response
     */
    public function edit(Sent $sent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sent  $sent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sent $sent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sent  $sent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->sent->deleteSentDocument($id);
        return redirect()->back();
    }
}
