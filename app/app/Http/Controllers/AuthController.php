<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Role;
use App\User;
use Socialite;

class AuthController extends Controller {

  public function googleRedirect() {
    return Socialite::driver('google')->with(['hd' => config('explorers.auth_domain')])->redirect();
  }

  public function googleCallback() {
    $google = Socialite::driver('google')->user();
    $user = User::where('email', $google->getEmail())->first();

    if($user) {
      $user->updateFromGoogle($google);
      Auth::login($user, true);
    } else {
      $user = new User;
      $user->email = $google->getEmail();
      $user->updateFromGoogle($google);

      $role = Role::where('name', 'user')->first();
      $user->role_id = $role->id;
      $user->save();

      Auth::login($user, true);
    }

    // TODO: make some sort of nice landing page
    return redirect()->to('/');
  }

  public function logout() {
    Auth::logout();
    return redirect()->to('/');
  }

}
?>
