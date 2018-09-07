<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentSubmitRequest;
use App\Repositories\Document\DocumentInterface;
use App\Repositories\User\UserInterface;
use App\Repositories\Sent\SentInterface;
use Illuminate\Support\Facades\Response as FacadeResponse;

class DocumentController extends Controller
{
  protected $document;
  protected $user;
  protected $sent;

  public function __construct(DocumentInterface $document, UserInterface $user, SentInterface $sent){
    $this->document = $document;
    $this->user = $user;
    $this->sent = $sent;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$pathToFile = "public/django-intro.pdf";
      //return response()->download($pathToFile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hrnots = $this->document->receiveHrDocument();
        $mdnots = $this->document->receiveMdDocument();
        $stnots = $this->document->receiveStDocument();
        return view('upload', compact('hrnots', 'mdnots','stnots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentSubmitRequest $request)
    {
        if ($request->hasFile('file')) {
          // collect user inputs
           $filedesc = $request->input('filedesc');
           $tagName = $request->input('tagName');
           $sendTo = $request->input('sendTo');

          // $user_id = Auth::user()->id;

           // store file into the storage
           $filename = $request->file->getClientOriginalName();
           $request->file->storeAs('document', $filename);
           $this->document->SaveDocument($filedesc, $tagName, $sendTo, $filename);
           return redirect()->back()->with('info', 'document sent');
        } else {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $filename = $this->document->downloadDocument($id);

       $pathToFile = storage_path('app/public/document/' . $filename);

       return FacadeResponse::make(file_get_contents($pathToFile), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
       // $hrnots = $this->document->receiveHrDocument();
       // $mdnots = $this->document->receiveMdDocument();
       // $stnots = $this->document->receiveStDocument();
       //return view('show', compact('hrnots', 'mdnots','stnots','pathToFile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function sent(){
      $sent = $this->document->showSentDocument();
      $hrnots = $this->document->receiveHrDocument();
      $mdnots = $this->document->receiveMdDocument();
      $stnots = $this->document->receiveStDocument();
      return view('sent', compact('hrnots', 'mdnots','stnots', 'sent'));
    }

    public function received(){
      $receivedHr = $this->document->showHrReceivedDocument();
      $receivedMd = $this->document->showMdReceivedDocument();
      $receivedSt = $this->document->showStReceivedDocument();
      $hrnots = $this->document->receiveHrDocument();
      $mdnots = $this->document->receiveMdDocument();
      $stnots = $this->document->receiveStDocument();
      //return json_encode($receivedSt);
      return view('received', compact('hrnots', 'mdnots','stnots', 'receivedHr','receivedMd','receivedSt'));
    }
}
