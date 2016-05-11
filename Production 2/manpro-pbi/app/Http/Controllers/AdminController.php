<?php
// strongest controller in this laravel app LOL
// handles all CRUD for data_dosen and publikasi
// handle requests on /admin too
namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use Carbon\carbon;
use App\Publication;
use App\DataDosen;
use App\Author;
use App\Program;
use Input;
use Validator;
use Session;
use Illuminate\Http\Request;
use File;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class AdminController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  // public function index(){
  //   return view('admin.general');
  // }

  public function getDataPublikasi(){
    $data = Publication::all();
    return view('admin.publication.data_publikasi')->with('data', $data);
  }

  public function editPublikasi($id){
    $data = Publication::findOrFail($id);
    return view('admin.publication.edit_publikasi')->withData($data);
  }

  public function deletePublikasi($id){
    $data = Publication::findOrFail($id);
    return view('admin.publication.confirm_delete_publikasi')->withData($data);
  }

  public function destroyPublikasi($id)
  {
    $data = Publication::findOrFail($id);
    $data->delete();
    Session::flash('success', 'Data Telah Dihapus');
    return redirect( route('data_publikasi'));
  }

  public function tambahPublikasi(Request $request)
  {
    $input = $request->all();
    $authorCount = $input['authors'];
    $noimage = false;
    if($request->hasFile('image')){
      $file = array('image' => $request-> file('image'));
      $rules = array(
        'image' => 'required|image',
        'judul' => 'required',
        'abstract' => 'required',
        'pdf' => 'required|mimes:pdf',
        'date' => 'required|date_format:d/m/Y|before:today'
      );
      for($i =1; $i <=$authorCount; $i++){
        $rules['author'.$i] = 'required';
      }
    }else{
      $noimage = true;
      $rules = array(
        'judul' => 'required',
        'abstract' => 'required',
        'pdf' => 'required|mimes:pdf',
        'date' => 'required|date_format:d/m/Y|before:today'
      );
      for($i =1; $i <=$authorCount; $i++){
        $rules['author'.$i] = 'required';
      }
    }
    $this->validate($request, $rules);
    //$input['slug'] = Carbon::now()->year();

    //generate slug name
    $name = '';
    for($i =1; $i <= $authorCount; $i++){
      $tmp = $request->input('author'.$i);
      $tmp = substr($tmp, 0,3);
      $name .= $tmp;
    }
    $vowels = array('-', ':', ' ');
    $name = str_replace($vowels,"",$name);
    $time = str_replace($vowels, "", Carbon::now());
    $slugname = $name.$time;
    $data = array();
    $data['slug'] = $slugname;

    if($noimage){
      $data['imgMime'] = 'no image';
    }else {
      if ($request->file('image')->isValid()) {
        $destinationPath = 'uploads\img\publikasi'; // upload path
        $extension = $request-> file('image')->getClientOriginalExtension(); // getting image extension
        $imageName = $slugname.'.'.$extension; // renameing image
        $request->file('image')->move($destinationPath, $imageName);
        $data['imgMime'] = $extension;
      }else{
        Session::flash('error', 'File gambar yang diupload tidak valid');
        return redirect()->back();
      }
    }

    if($request->file('pdf')->isValid()){
      $destinationPath = 'uploads\pdf\publikasi'; // upload path
      $fileName = $slugname.'.pdf'; // renameing image
      $request->file('pdf')->move($destinationPath, $fileName);
      $data['Filename'] = $fileName;
    }else{
      Session::flash('error', 'File pdf yang diupload tidak valid');
      return redirect()->back();
    }

    $data['title'] = $request['judul'];
    $data['abstract'] = $request['abstract'];
    $data['creator_id'] = Auth::id();
    $data['date'] = Carbon::createFromFormat('d/m/Y', $request['date']);

    $pub = Publication::create($data);

    echo $pub->id;
    $authorsnow = [];
    for($i =1; $i <= $authorCount; $i++){
      $authorname = $request->input('author'.$i);
      try{
        $haha =  author::where('name', $authorname)->firstOrFail();
      }catch(ModelNotFoundException $e){
        $haha =  author::create(['name'=> $authorname]);
      }
      $authorsnow[$i] = $haha;
      $pub->authors()->attach($authorsnow[$i]->id);
    }
    Session::flash('success', 'Publikasi Telah Ditambahkan');
    return redirect( route('data_publikasi'));
  }

  public function updatePublikasi(Request $request, $id)
  {
    $datas = Publication::findOrFail($id);

    $authorCount = $request->input('authors');
    $noimage = false;
    $nopdf = false;
    $rules = array(
      'judul' => 'required',
      'abstract' => 'required',
      'date' => 'required|date_format:d/m/Y|before:today'
    );
    for($i =1; $i <= $authorCount; $i++){
      $rules['author'.$i] = 'required';
    }

    if( !strcmp($request->Input('changeImage'), 'true')){
      $file = array('image' => $request-> file('image'));
      $rules['image'] = 'required|image';
    }else{
      $noimage = true;
    }

    if( !strcmp( $request->Input('changePdf'), 'true') ){
      $rules['file'] = 'required|mimes:pdf';
    }else{
      $nopdf = true;
    }

    $this->validate($request, $rules);

    //generate slug name
    $name = '';
    for($i =1; $i <= $authorCount; $i++){
      $tmp = $request->input('author'.$i);
      $tmp = substr($tmp, 0,3);
      $name .= $tmp;
    }
    $vowels = array('-', ':', ' ');
    $name = str_replace($vowels,"",$name);
    $time = str_replace($vowels, "", Carbon::now());
    $slugname = $name.$time;

    $oldslug = $datas['slug'];
    $datas['slug'] = $slugname;

    if(!$noimage){
      if($request->file('image')->isValid()){
        $destinationPath = 'uploads\img\publikasi'; // upload path
        $extension = $request-> file('image')->getClientOriginalExtension(); // getting image extension
        $imageName = $slugname.'.'.$extension; // renameing image
        $request->file('image')->move($destinationPath, $imageName);
        if(strcmp($datas['imgMime'],'no image'))
          unlink(public_path($destinationPath.'\\'.$oldslug.'.'.$datas['imgMime']));
        $datas['imgMime'] = $extension;
      }else{
        Session::flash('error', 'File gambar yang diupload tidak valid');
        return redirect()->back();
      }
    }

    if(!$nopdf){
      if($request->file('pdf')->isValid()){
        $destinationPath = 'uploads\pdf\publikasi'; // upload path
        $fileName = $slugname.'.pdf'; // renameing image
        $request->file('pdf')->move($destinationPath, $fileName);
        unlink(public_path($destinationPath.'\\'.$Datas['Filename']));
        $datas['Filename'] = $fileName;
      }else{
        Session::flash('error', 'File pdf yang diupload tidak valid');
        return redirect()->back();
      }
    }
    $datas['title'] = $request['judul'];
    $datas['abstract'] = $request['abstract'];
    $datas['creator_id'] = Auth::id();
    $datas['date'] = Carbon::createFromFormat('d/m/Y', $request['date']);
    $datas->save();
    $datas->authors()->detach();

    for($i =1; $i <= $authorCount; $i++){
      $authorname = $request->input('author'.$i);
      try{
        $haha =  author::where('name', $authorname)->firstOrFail();
      }catch(ModelNotFoundException $e){
        $haha =  author::create(['name'=> $authorname]);
      }
      $authorsnow[$i] = $haha;
      $datas->authors()->attach($authorsnow[$i]->id);
    }

    return redirect(route('data_publikasi'));
  }

  // function for data_dosen

  public function getDataDosen(){
    $data = DataDosen::all();
    return view('admin.data_dosen.data_dosen')->with('data', $data);
  }

  public function editDosen($id){
    $data = DataDosen::findOrFail($id);
    return view('admin.data_dosen.edit_dosen')->withData($data);
  }

  public function updateDosen(Request $request, $id){
    $data = DataDosen::findOrFail($id);
    $reqs = $request->all();

    $noimage = false;
    if(strcmp($reqs['changeImage'] , 'false')){
      $rules = array(
        'image' => 'required|image',
        'jabatan' => 'required',
        'nama' => 'required',
        'profile' => 'required',
      );
    }else{
      $rules = array(
        'jabatan' => 'required',
        'nama' => 'required',
        'profile' => 'required',
      );
      $noimage = true;
    }
    $this->validate($request, $rules);
    if($noimage){

    }else {
      $oldfile = 'public/uploads/img/dosen/'.$data->image;
      if($request->file('image')->isValid()) {
        $destinationPath = 'uploads\img\dosen'; // upload path
        $extension = $request-> file('image')->getClientOriginalExtension(); // getting image extension
        $name = $request->input('nama');
        $vowels = array('-', ':');
        $time = str_replace($vowels, "", Carbon::now());
        $fileName = $name.$time.'.'.$extension; // renameing image
        $request->file('image')->move($destinationPath, $fileName);
        $data['image'] = $fileName;
      }else{
        Session::flash('error', 'File yang diupload tidak valid!');
        return redirect()->back();
      }
      File::delete($oldfile);
    }
    $data['id'] = $id;
    $data['nama'] = $reqs['nama'];
    $data['jabatan'] = $reqs['jabatan'];
    $data['profile'] = $reqs['profile'];
    $data->save();
    Session::flash('success', 'Data Updated');
    return redirect( route('data_dosen'));
  }

  public function tambahDosen(Request $request){
    $noimage = false;
    if($request->hasFile('image')){
      $file = array('image' => $request-> file('image'));
      $rules = array(
        'image' => 'required|image',
        'jabatan' => 'required',
        'nama' => 'required',
        'profile' => 'required',
      );
      $noimage = false;
    }else{
      $noimage = true;
      $rules = array(
        'jabatan' => 'required',
        'nama' => 'required',
        'profile' => 'required',
      );
    }

    $this->validate($request, $rules);
    $data = $request->all();
    if($noimage){
      $data['image'] = 'no image';
    }else {
      if ($request->file('image')->isValid()) {
        $destinationPath = 'uploads\img\dosen'; // upload path
        $extension = $request-> file('image')->getClientOriginalExtension(); // getting image extension
        $name = $request->input('nama');
        $vowels = array('-', ':');
        $time = str_replace($vowels, "", Carbon::now());
        $fileName = $name.$time.'.'.$extension; // renameing image
        $request->file('image')->move($destinationPath, $fileName);
        $data['image'] = $fileName;
      }else{
        Session::flash('error', 'File yang diupload tidak valid!');
        return redirect()->back();
      }
    }

    DataDosen::create($data);
    Session::flash('success', 'Data Berhasil Ditambahkan');
    return redirect()->back();
  }

  public function deleteDosen($id)
  {
    $data = DataDosen::findOrFail($id);
    return view('admin.data_dosen.confirm_delete_dosen')->withData($data);
  }

  public function destroyDosen($id)
  {
    $data = DataDosen::findOrFail($id);
    $data->delete();
    Session::flash('success', 'Data Telah Dihapus');
    return redirect( route('data_dosen'));
  }

  // function for program

  public function getDataProgram(){
    $data = Program::all();
    return view('admin.program.data_program')->with('data', $data);
  }

  public function editProgram($id){
    $data = Program::findOrFail($id);
    return view('admin.program.edit_program')->withData($data);
  }

  public function updateProgram(Request $request, $id){
    $data = Program::findOrFail($id);
    $reqs = $request->all();

    $noimage = false;
    if(strcmp($reqs['changeImage'] , 'false')){
      $rules = array(
        'image' => 'required|image',
        'judul' => 'required',
        'deskripsi' => 'required'
      );
    }else{
      $rules = array(
        'judul' => 'required',
        'deskripsi' => 'required'
      );
      $noimage = true;
    }
    $this->validate($request, $rules);
    if($noimage){

    }else {
      $oldfile = 'public/uploads/img/program/'.$data->image;
      if($request->file('image')->isValid()) {
        $destinationPath = 'uploads\img\program'; // upload path
        $extension = $request-> file('image')->getClientOriginalExtension(); // getting image extension
        $name = $request->input('nama');
        $vowels = array('-', ':');
        $time = str_replace($vowels, "", Carbon::now());
        $fileName = $name.$time.'.'.$extension; // renameing image
        $request->file('image')->move($destinationPath, $fileName);
        $data['image'] = $fileName;
      }else{
        Session::flash('error', 'File yang diupload tidak valid!');
        return redirect()->back();
      }
      //File::delete($oldfile);
    }

    $data['id'] = $id;
    $data['judul'] = $reqs['judul'];
    $data['deskripsi'] = $reqs['deskripsi'];

    $data->save();
    Session::flash('success', 'Data Updated');
    return redirect( route('data_program'));
  }

  public function tambahProgram(Request $request){
    $rules = array(
      'image' => 'required|image',
      'judul' => 'required',
      'deskripsi' => 'required'
    );

    $this->validate($request, $rules);

    $file = array('image' => $request-> file('image'));

    $data = $request->all();
    if ($request->file('image')->isValid()) {
      $destinationPath = 'uploads\img\program'; // upload path
      $extension = $request-> file('image')->getClientOriginalExtension(); // getting image extension
      $name = $request->input('judul');
      $vowels = array('-', ':', " ");
      $time = str_replace($vowels, "", Carbon::now());
      $fileName = $name.$time.'.'.$extension; // renameing image
      $request->file('image')->move($destinationPath, $fileName);
      $data['image'] = $fileName;
    }else{
      Session::flash('error', 'File yang diupload tidak valid!');
      return redirect()->back();
    }

    Program::create($data);
    Session::flash('success', 'Data Berhasil Ditambahkan');
    return redirect()->back();
  }

  public function deleteProgram($id)
  {
    $data = Program::findOrFail($id);
    return view('admin.program.confirm_delete_program')->withData($data);
  }

  public function destroyProgram($id)
  {
    $data = Program::findOrFail($id);
    $data->delete();
    Session::flash('success', 'Data Telah Dihapus');
    return redirect( route('data_program'));
  }

  public function getLogout(){
    auth()->guard()->logout();
    return redirect()->route('home');
  }
}
