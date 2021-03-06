<?php
namespace App\Repositories\Document;
use App\Repositories\Document\DocumentInterface;
use App\Repositories\Sent\SentInterface;
use App\Document;
use App\User;
use Auth;
use DB;
class DocumentRepository implements DocumentInterface
{
  protected $document;
  protected $user;
  protected $sent;

  function __construct(Document $document, User $user, SentInterface $sent)
  {
    $this->user = $user;
    $this->document = $document;
    $this->sent = $sent;
  }

  public function saveDocument($filedesc, $tagName, $sendTo, $filename){

      $user_id = Auth::user()->id;
      $this->document->user_id = $user_id;
      $this->document->filedesc = $filedesc;
      $this->document->tagName = $tagName;
      $this->document->receiver = $sendTo;
      $this->document->file = $filename;
      $this->document->status = "Unread";

      // save document
      $this->document->save();
      // save sent document
      $this->sent->saveSent($user_id, $filedesc, $filename, $sendTo);
  }

  public function downloadDocument($id){
    $mydoc = DB::table('documents')
    ->where('id', $id)
    ->first();
    $filepath = $mydoc->file;
    return $filepath;
  }


  public function receiveHrDocument(){
    $mynots = DB::table('documents')
    ->where('receiver', 'HR')
    ->get();
    return $mynots;
  }

  public function receiveMdDocument(){
    $mdnots = DB::table('documents')
    ->where('receiver', 'Manager')
    ->get();
    return $mdnots;
  }

  public function receiveStDocument(){
    $stnots = DB::table('documents')
    ->where('receiver', 'Staff')
    ->get();
    return $stnots;
  }

  public function showSentDocument(){
    $user_id = Auth::user()->id;
    $sent = DB::table('sents')
    ->where('user_id', $user_id)->get();
    return $sent;
  }

  public function showHrReceivedDocument(){
    $user_id = Auth::user()->id;
    $receivedHr = DB::table('documents AS d')
    ->join('users AS u','u.id', '=', 'd.user_id')
    ->select('d.id as doc_id', 'd.filedesc as filedesc', 'd.tagName as tagName', 'd.receiver as receiver', 'd.file as file', 'u.lastname as lastname' ,'u.role as role', 'd.created_at as created_at')
    ->where('receiver', 'HR')
    ->get();
    return $receivedHr;
  }

  public function showMdReceivedDocument(){
    $user_id = Auth::user()->id;
    $receivedMd = DB::table('documents AS d')
    ->join('users AS u','d.user_id', '=', 'u.id')
    ->select('d.id as doc_id', 'd.filedesc as filedesc', 'd.tagName as tagName', 'd.receiver as receiver', 'd.file as file', 'u.lastname as lastname' ,'u.role as role', 'd.created_at as created_at')
    ->where('receiver', 'Manager')
    ->get();
    return $receivedMd;
  }

  public function showStReceivedDocument(){
    $user_id = Auth::user()->id;
    $receivedSt = DB::table('documents AS d')
    ->Join('users AS u','d.user_id', '=', 'u.id')
    ->select('d.id as doc_id', 'd.filedesc as filedesc', 'd.tagName as tagName', 'd.receiver as receiver', 'd.file as file', 'u.lastname as lastname' ,'u.role as role', 'd.created_at as created_at')
    ->where('receiver', 'Staff')
    ->get();
    return $receivedSt;
  }
}


 ?>
