<?php
namespace App\Repositories\Sent;
use App\Repositories\Sent\SentInterface;
use App\User;
use App\Sent;
use DB;

class SentRepository implements SentInterface
{
  protected $sent;

  function __construct(Sent $sent)
  {
    $this->sent = $sent;
  }

  public function saveSent($user_id, $filedesc, $filename, $sendTo){
    $this->sent->user_id = $user_id;
    $this->sent->filedesc = $filedesc;
    $this->sent->file = $filename;
    $this->sent->sentTo = $sendTo;
    // save sent
    $this->sent->save();
  }


  public function deleteSentDocument($id){
    $document = $this->sent::find($id);
    $document->delete();
  }
}
