<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Trip;
use App\Models\TripExtra;
use App\Models\Booking;

use \Carbon\Carbon;

use Notification;
use Validator;
use DB;
use File;
use Image;

class TripController extends Controller
{
    function __construct(
        Trip $trip,
        TripExtra $tripExtra,
        Booking $booking
    ){
        $this->middleware('permission:trip-list', ['only' => ['index','show']]);
        $this->middleware('permission:trip-create', ['only' => ['create','simpan']]);
        $this->middleware('permission:trip-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:trip-update', ['only' => ['update']]);
        $this->middleware('permission:trip-delete', ['only' => ['destroy']]);

        $this->trip = $trip;
        $this->trip_extra = $tripExtra;
        $this->booking = $booking;
    }
    // Menampilkan semua trip yang tersedia
    public function index(Request $request)
    {
        $data['trips'] = $this->trip->orderBy('created_at','desc')->paginate(10);
        // if ($request->ajax()) {
        //     $data = $this->trip->all();
        //     return DataTables::of($data)
        //                     ->addIndexColumn()
        //                     ->addColumn('status', function($row){

        //                     })
        //                     ->addColumn('action', function($row){

        //                     })
        //                     ->rawColumns(['action','status','images'])
        //                     ->make(true);
        // }
        // activity()->all()->last();
        // activity()->log('Look mum, I logged something');

        return view('backend.trips.index',$data);
    }

    public function create()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://www.apicountries.com/countries',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            // CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ));

        $response = curl_exec($curl);
        // dd($response);
        $error = curl_error($curl);

        curl_close($curl);

        if (empty($response)) {
            $data['countries'] = [];
        }else{
            $data['countries'] = json_decode($response);
        }

        return view('backend.trips.create',$data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'trip_name'  => 'required',
            'trip_category'  => 'required',
            'trip_description'  => 'required',
            'trip_price'  => 'required',
            'trip_images'  => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
        ];

        $messages = [
            'trip_name.required'   => 'Nama Trip wajib diisi.',
            'trip_category.required'   => 'Kategori File wajib diisi.',
            'trip_description.required'   => 'Deskripsi wajib diisi.',
            'trip_price.required'   => 'Price wajib diisi.',
            'trip_images.required'   => 'Upload Image wajib diisi.',
            'trip_images.mimes'   => 'Upload Image harus extensi .jpeg/.jpg',
            'trip_images.max'   => 'Upload Image maksimal 2MB',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        // dd($validator);
        if ($validator->passes()){

            // $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['trip_code'] = 'TRIP'.rand(10000,99999);
            $input['trip_name'] = $request->trip_name;
            $input['trip_category'] = $request->trip_category;
            $input['trip_description'] = $request->trip_description;
            $input['trip_price'] = $request->trip_price;
            $input['trip_experience'] = json_encode($request->experience);
            $input['trip_facilities'] = json_encode($request->facilities);
            $input['trip_tour_plan'] = json_encode($request->tour_plants);
            // dd($input);

            if ($request->file('trip_images')) {
                $file = $request->file('trip_images');
                // $fileName = 'trip_'.time().'.'.$file->getClientOriginalExtension();
                $tujuanUpload = 'plesiranindonesia/trip/'.$input['trip_code'];
                $img = Image::make($file->path());

                $watermark =  Image::make(public_path('logo/logoppiwhite.png'));
                $watermarkSize = $img->width() - 20; //size of the image minus 20 margins
                $watermarkSize = $img->width() / 2; //half of the image size
                $resizePercentage = 80;//70% less then an actual image (play with this value)
                $watermarkSize = round($img->width() * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image

                $watermark->resize($watermarkSize, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $img->insert($watermark, 'top-left', 50, 50);
                $img = $img->encode('webp', 75);

                $fileName = 'trip_wisata_'.Carbon::now()->format('dmY_His').'_'.rand(1000,9999).'.webp';
                $filePath = 'plesiranindonesia/trip/'.$input['trip_code'].'/'.$fileName;

                Storage::disk('s3')->put($filePath, $img->stream(),"public");
                $resultTripImage = Storage::disk('s3')->url($filePath);

                // Proses Upload File ke Object Storage
                // $result = Storage::disk('s3')->putFileAs($tujuanUpload, $file, $file->getClientOriginalName());
                // Storage::disk('s3')->putFileAs($tujuanUpload, $file, $fileName);
                // Proses merubah visibility file agar bisa di akses secara public
                // Storage::disk('s3')->setVisibility($tujuanUpload."/".$fileName,"public");
                // Proses mengambil URL hasil upload
                // $resultTripImage = Storage::disk('s3')->url($tujuanUpload."/".$fileName);
                // $path = Storage::disk('s3')->put('images', $request->trip_images);
                // $path = Storage::disk('s3')->url($path);
                // $input['trip_images'] = $resultTripImage;
                $input['trip_images'] = $fileName;
            }

            $tujuanUploadTripGallery = 'plesiranindonesia/trip/trip_gallery/'.$input['trip_code'];

            $array_trip_gallery = [];
            foreach ($request->trip_gallery as $key => $trip_gallery) {
                $fileTripGallery = $trip_gallery['image_gallery'];
                $imgTripGallery = Image::make($fileTripGallery->path());
                $imgTripGallery = $imgTripGallery->encode('webp', 30);
                $fileNameTripGallery = 'trip_gallery_'.Carbon::now()->format('dmY_His').'_'.rand(1000,9999).'.webp';

                Storage::disk('s3')->putFileAs($tujuanUploadTripGallery, $fileTripGallery, $fileNameTripGallery);
                Storage::disk('s3')->setVisibility($tujuanUploadTripGallery."/".$fileNameTripGallery,"public");
                $resultTripGallery = Storage::disk('s3')->url($tujuanUploadTripGallery."/".$fileNameTripGallery);

                $array_trip_gallery[] = [
                    // 'trip_gallery' => $resultTripGallery
                    'trip_gallery' => $fileNameTripGallery
                ];
            }

            $input['trip_gallery'] = json_encode($array_trip_gallery);

            // dd($input);

            $simpanTrip = $this->trip->create($input);

            if ($simpanTrip) {
                foreach ($request->extra as $key => $extra) {
                    $this->trip_extra->create([
                        'trip_id' => $input['id'],
                        'extra_name' => $extra['extra'],
                        'extra_price' => $extra['price']
                    ]);
                }
                return redirect()->route('admin.trip')->with('success','Trip '.$input['trip_name'].' Berhasil Disimpan');
            }

            // dd($array_trip_gallery);
        }

        // return response()->json([
        //     'success' => false,
        //     'error' => $validator->errors()->all()
        // ]);
        // dd($validator->errors()->all());
        return redirect()->back()->with('errors',$validator->errors())->withInput();
    }

    public function show($id)
    {
        $data['trip'] = $this->trip->find($id);

        if (empty($data['trip'])) {
            return redirect()->back()->with('error','Trip Tidak Ditemukan');
        }

        return view('backend.trips.view',$data);
    }

    public function edit($id)
    {
        $data['trip'] = $this->trip->find($id);

        if (empty($data['trip'])) {
            return redirect()->back()->with('error','Trip Tidak Ditemukan');
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_FRESH_CONNECT  => true,
            CURLOPT_URL            => 'https://www.apicountries.com/countries',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            // CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
            CURLOPT_FAILONERROR    => false,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4
        ));

        $response = curl_exec($curl);
        // dd($response);
        $error = curl_error($curl);

        curl_close($curl);

        if (empty($response)) {
            $data['countries'] = [];
        }else{
            $data['countries'] = json_decode($response);
        }

        // dd($data['countries']);

        return view('backend.trips.edit',$data);

    }

    public function update(Request $request, $id)
    {
        $rules = [
            'trip_name'  => 'required',
            'trip_category'  => 'required',
            'trip_country'  => 'required',
            'trip_description'  => 'required',
            'trip_price'  => 'required',
            'trip_images'  => 'image|mimes:jpeg,jpg,png,svg|max:2048',
        ];

        $messages = [
            'trip_name.required'   => 'Nama Trip wajib diisi.',
            'trip_category.required'   => 'Kategori wajib diisi.',
            'trip_country.required'   => 'Negara wajib diisi.',
            'trip_description.required'   => 'Deskripsi wajib diisi.',
            'trip_price.required'   => 'Price wajib diisi.',
            'trip_images.mimes'   => 'Upload Image harus extensi .jpeg/.jpg',
            'trip_images.max'   => 'Upload Image maksimal 2MB',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()){
            $trip = $this->trip->find($id);

            if (empty($trip)) {
                return redirect()->back()->with('error','Trip Tidak Ditemukan');
            }

            // dd($request->all());

            $input['trip_name'] = $request->trip_name;
            $input['trip_category'] = $request->trip_category;
            $input['trip_country'] = $request->trip_country;
            $input['trip_description'] = $request->trip_description;
            $input['trip_price'] = $request->trip_price;
            $input['trip_experience'] = json_encode($request->experience);
            $input['trip_facilities'] = json_encode($request->facilities);
            $input['trip_tour_plan'] = json_encode($request->tour_plants);

            if ($request->file('trip_images')) {
                // $deleteTripImage = parse_url($trip->trip_images);
                Storage::disk('s3')->delete('plesiranindonesia/trip/'.$trip->trip_code.'/'.$trip->trip_images);

                $file = $request->file('trip_images');
                // $fileName = 'trip_'.time().'.'.$file->getClientOriginalExtension();
                $tujuanUpload = 'plesiranindonesia/trip/'.$trip->trip_code;
                $img = Image::make($file->path());

                $watermark =  Image::make(public_path('logo/logoppiwhite.png'));
                $watermarkSize = $img->width() - 20; //size of the image minus 20 margins
                $watermarkSize = $img->width() / 2; //half of the image size
                $resizePercentage = 80;//70% less then an actual image (play with this value)
                $watermarkSize = round($img->width() * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image

                $watermark->resize($watermarkSize, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $img->insert($watermark, 'top-left', 50, 50);
                $img = $img->encode('webp', 75);

                $fileName = 'trip_wisata_'.Carbon::now()->format('dmY_His').'_'.rand(1000,9999).'.webp';
                $filePath = 'plesiranindonesia/trip/'.$trip->trip_code.'/'.$fileName;
                // dd($img->stream());
                // Storage::disk('s3')->putFileAs($tujuanUpload, $file, $fileName);
                // Storage::disk('s3')->setVisibility($tujuanUpload."/".$fileName,"public");
                Storage::disk('s3')->put($filePath, $img->stream(),"public");
                $resultTripImage = Storage::disk('s3')->url($filePath);
                // Storage::disk('s3')->setVisibility($tujuanUpload."/".$img->stream()->detach(),"public");
                // $resultTripImage = Storage::disk('s3')->url($tujuanUpload."/".$fileName);
                // $input['trip_images'] = $resultTripImage;
                $input['trip_images'] = $fileName;
            }

            if ($request->select_upload_file == 'Y') {
                $arrayDeleteTripGallery = [];
                foreach (json_decode($trip->trip_gallery) as $key => $trip_gallery) {
                    $arrayDeleteTripGallery[] = '/plesiranindonesia/trip/trip_gallery/'.$trip->trip_code.'/'.$trip_gallery->trip_gallery;
                }

                Storage::disk('s3')->delete($arrayDeleteTripGallery);

                $tujuanUploadTripGallery = 'plesiranindonesia/trip/trip_gallery/'.$trip->trip_code;

                $array_trip_gallery = [];
                foreach ($request->trip_gallery as $key => $trip_gallery) {
                    $fileTripGallery = $trip_gallery['image_gallery'];
                    $imgTripGallery = Image::make($fileTripGallery->path());
                    $imgTripGallery = $imgTripGallery->encode('webp', 30);
                    $fileNameTripGallery = 'trip_gallery_'.Carbon::now()->format('dmY_His').'_'.rand(1000,9999).'.webp';

                    Storage::disk('s3')->putFileAs($tujuanUploadTripGallery, $fileTripGallery, $fileNameTripGallery);
                    Storage::disk('s3')->setVisibility($tujuanUploadTripGallery."/".$fileNameTripGallery,"public");
                    $resultTripGallery = Storage::disk('s3')->url($tujuanUploadTripGallery."/".$fileNameTripGallery);

                    $array_trip_gallery[] = [
                        'trip_gallery' => $fileNameTripGallery
                    ];
                }

                $input['trip_gallery'] = json_encode($array_trip_gallery);
            }

            $trip->update($input);

            if ($trip) {
                foreach ($request->extra as $key => $extra) {
                    $cekTripExtra = $this->trip_extra->where('id',$extra['id'])->where('trip_id',$trip->id)->first();
                    if (empty($cekTripExtra)) {
                        $this->trip_extra->create([
                            'trip_id' => $trip->id,
                            'extra_name' => $extra['extra'],
                            'extra_price' => $extra['price']
                        ]);
                    }else{
                        $cekTripExtra->update([
                            'extra_name' => $extra['extra'],
                            'extra_price' => $extra['price']
                        ]);
                    }
                }
                return redirect()->route('admin.trip')->with('success','Trip '.$input['trip_name'].' Berhasil Diupdate');
            }

        }

        return redirect()->back()->with('errors',$validator->errors())->withInput();

    }

    public function destroy(Request $request, $id)
    {
        $trip = $this->trip->find($id);

        if (empty($trip)) {
            return redirect()->back()->with('error','Trip Tidak Ditemukan');
        }

        if (Storage::disk('s3')->exists('/plesiranindonesia/trip/'.$trip->trip_code)) {
            Storage::disk('s3')->deleteDirectory('/plesiranindonesia/trip/'.$trip->trip_code);
            Storage::disk('s3')->deleteDirectory('/plesiranindonesia/trip/trip_gallery/'.$trip->trip_code);
        }

        $trip->delete();

        foreach ($trip->trip_extra as $key => $trip_extra) {
            $trip_extra->delete();
        }

        return redirect()->back()->with('success','Trip Berhasil Dihapus');

    }
}
