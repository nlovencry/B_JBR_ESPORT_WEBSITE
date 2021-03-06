<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Game;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'jenis_kelamin' => ['required'],
            'usia' => ['required','max:2'],
            'nohp' => ['required', 'max:13'],
            'alamat' => ['required','max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => strtolower($data['email']),
            'name' => ucwords(strtolower($data['name'])),
            'jenis_kelamin' => $data['jenis_kelamin'],
            'usia' => $data['usia'],
            'nohp' => $data['nohp'],
            'alamat' => $data['alamat'],
            'password' => Hash::make($data['password']),
            'role' => '3',
            'is_active' => '1',
        ]);

        $player_id = $user->id;
        $tanggal = now();
        $date = Carbon::parse($tanggal);
        $nama_foto =  $data['foto'];
        $nama_winrate =  $data['winrate'];
        if($data['foto']){
             $foto = $data['foto'];
             $namafoto = $data['name'].'_'.$foto->getClientOriginalName();
             $nama_foto = str_replace(' ','-',$namafoto);
             $pathfoto = $foto->move('images',$nama_foto);
        }
        if($data['winrate']){
            $winrate = $data['winrate'];
            $namawinrate = $data['name'].'_'.$winrate->getClientOriginalName();
            $nama_winrate = str_replace(' ','-',$namawinrate);
            $pathwinrate = $winrate->move('images',$nama_winrate);
        }
        $player = DB::table('player')->insert([
            'id_game' => $data['id_game'],
            'id_team' => 0,
            'id' => $player_id,
            'foto' => $nama_foto,
            'winrate' => $nama_winrate,
            'izin_ortu' => $data['izin_ortu'],
            'bersedia_offline' => $data['bersedia_offline'],
            'nohp_ortu' => $data['nohp_ortu'],
            'created_at' => $tanggal,
            'updated_at' => $tanggal,
        ]);
        $array = [$user,$player];
        return $array;
    }
}
