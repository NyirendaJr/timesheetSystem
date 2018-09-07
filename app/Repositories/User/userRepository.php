<?php
namespace App\Repositories\User;
use App\Repositories\User\UserInterface;
use App\User;
use DB;


class UserRepository implements UserInterface
{
  protected $user;

  function __construct(User $user)
  {
    $this->user = $user;
  }


  public function fullname($firstname, $lastname){
    $fullname = $firstname . ' ' . $lastname;
    return $fullname;
  }
}
