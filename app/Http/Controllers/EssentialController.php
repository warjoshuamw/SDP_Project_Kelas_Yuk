<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\NilaiTugasMurid;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EssentialController extends Controller
{
    public function GoToLogin()
    {
        return view("pages.essential.login");
    }
    public function  GoTologout(Request $request)
    {
        if(Auth::guard('satpam_pengguna')->check()){
            Auth::guard('satpam_pengguna')->logout();
        }
        return view("pages.essential.login");
    }

    public function GoToDoLogin(Request $request)
    {//TODO ganti ke auth
        $ceklogin=false;
        $email=$request->input('email');
        $password=$request->input('password');
        $data_pengguna = Pengguna::all();

        $credential = [
            'pengguna_email' => $email,
            'password' => $password
        ];
        // dd($data_pengguna);
        // dd($credential);
        // dd(Auth::guard('satpam_pengguna'));
        if(Auth::guard('satpam_pengguna')->attempt($credential)){
            if(getAuthUser()->role_text == 'guru'){
                return redirect('/guru');
            }else{
                return redirect('/murid');
            }

        }else{
            return view("pages.essential.login",['gagal'=>true]);
        }

        if($data_pengguna!=null){
            foreach ($data_pengguna as $pgw ) { //cek login user
                if($pgw->pengguna_email==$email && $pgw->pengguna_password==$password ){
                   $ceklogin=true;
                   $tempuser=$pgw;
                }
            }
        }

        if($ceklogin == false){
            return view("pages.essential.login",['gagal'=>true]);
        }

        $request->session()->put('user_logged', $tempuser);


        if($tempuser['pengguna_peran']=="0"){
            //bila user merupakan guru maka arahkan ke page guru
            $pengguna_id = $tempuser->pengguna_id;
            $tempuser = $tempuser;
            $dataKelas = Kelas::where('pengguna_id','=',$pengguna_id)->get();
            return redirect('/guru');
            // return view('pages.guru.guruHome',['dataKelas'=>$dataKelas,'user_login'=>$tempuser]);
        }else if($tempuser['pengguna_peran']=="1"){
            //bila user adalah murid maka arahkan ke page murid
            $pengguna_id = $tempuser->pengguna_id;
            $dataKelas = Kelas::where('pengguna_id','=',$pengguna_id)->get();
            return redirect('/murid');
        }
    }
    public function GoToRegister()
    {
        return view("pages.essential.Register");
    }

    public function GoToDoRegister(Request $request)
    {
        $data_pengguna = Pengguna::withTrashed()->orderBy('pengguna_id','desc')->get();
        $request -> validate(
            [
                'pengguna_nama' => ['required'],
                'pengguna_email'=> [
                    'required','unique:pengguna,pengguna_email','email'
                ],
                'pengguna_peran' => ['required'],
                'pengguna_password' => ['required', 'confirmed'],
            ],
            [
                'pengguna_nama.required' => "nama harus diisi",
                'pengguna_email.required' => "email harus diisi",
                'pengguna_email.email' => "email harus valid",
                'pengguna_password.confirmed' => "password and confirm password harus sama",
                'pengguna_password.required' => "password harus diisi",
            ]
        );

        $result = Pengguna::create($request->all()+ ['pengguna_tampilan' => '0']);
        $password = Hash::make($request->pengguna_password);
        $result->pengguna_password=$password;
        $result->save();
        $email=$request->input('pengguna_email');
        // $request->session()->put('user_logged', $result);
        // if ($request->pengguna_peran == 0) {
        //     return redirect('guru');
        // }else{
        //     return redirect('murid');
        // }

        $credential = [
            'pengguna_email' => $email,
            'password' => $request->pengguna_password
        ];
        // dd($data_pengguna);
        // dd($credential);
        // dd(Auth::guard('satpam_pengguna'));
        if(Auth::guard('satpam_pengguna')->attempt($credential)){
            if(getAuthUser()->role_text == 'guru'){
                return redirect('/guru');
            }else{
                return redirect('/murid');
            }

        }else{
            return view("pages.essential.login",['gagal'=>true]);
        }
    }
    public function goToLandingPage(Request $request)
    {
        $param = [];
        return view('pages.essential.landing',$param);
    }

    //controller untuk membantu pengambilan components
    public function cardKuisPilgan(Request $request)
    {
        return view('components.cardKuisPilgan',['i'=>$request->i]);
    }
    public function cardKuisUraian(Request $request)
    {
        return view('components.cardKuisUraian',['i'=>$request->i]);
    }
    public function downloadfile(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $kelas=$dataKelas->kelas_kode;
        return Storage::disk('local')->download("TugasKelas/$kelas/$request->namafile");
    }
    public function downloadallfile(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $datatugas = NilaiTugasMurid::where('tugas_id','=',$request->id_tugas)->get();

        $pengumpulan=0;
        $datapengumpulan= NilaiTugasMurid::where('tugas_id','=',$request->id_tugas)->where('url_pengumpulan','!=',null)->get();
        $pengumpulan=sizeof($datapengumpulan);
        if($pengumpulan==0){
            return back()->with("message", "Tidak ada File siswa yang dapat didownload");
        }
        // dd($datatugas);
        $fileName = 'TugasKelas'.$dataKelas->kelas_nama.'.zip';
        // dd(public_path());
        // File::delete(public_path().'/'.$fileName);
        // Storage::delete($fileName);
        $kelas=$dataKelas->kelas_kode;
        $zip = new \ZipArchive();


        if ($zip->open(storage_path($fileName), \ZipArchive::CREATE)== TRUE)
        {
            $files = File::files(storage_path("app/TugasKelas/$kelas"));
            foreach ($files as $key => $value){
                $relativeName = basename($value);
                foreach ($datatugas as $item) {
                    if($item->url_pengumpulan==$relativeName){
                        $zip->addFile($value, $relativeName);
                    }else{
                    }
                }

            }
            $zip->close();
        }

        return response()->download(storage_path($fileName))->deleteFileAfterSend(true);
    }

    // SETTINGS PROFILE

    public function goToSettingsProfile()
    {
        return view('pages.essential.settings');
    }
    public function doUpdateSettingsProfile(Request $request)
    {
        $pengguna = Pengguna::find(Auth::guard('satpam_pengguna')->user()->pengguna_id);
        $pengguna->pengguna_nama = $request->pengguna_nama;
        $pengguna->pengguna_email = $request->pengguna_email;
        $pengguna->pengguna_password = Hash::make($request->pengguna_password);
        $pengguna->save();
        return back();
    }
}
