<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Document\DocumentInterface;

class HomeController extends Controller
{
  protected $document;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DocumentInterface $document)
    {
        $this->middleware('auth');
        $this->document = $document;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $hrnots = $this->document->receiveHrDocument();
      $mdnots = $this->document->receiveMdDocument();
      $stnots = $this->document->receiveStDocument();
      return view('home', compact('hrnots', 'mdnots','stnots'));
    }
}
