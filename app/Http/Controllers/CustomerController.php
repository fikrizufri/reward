<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Traits\CrudTrait;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    use CrudTrait;

    public function __construct()
    {
        $this->route = 'customer';
        $this->title = "Pelanggan";
        $this->sort = 'nama';
        $this->plural = 'true';
        $this->manyToMany = ['role'];
        $this->relations = ['user'];
        $this->extraFrom = ['user'];

        $this->middleware('permission:view-' . $this->route, ['only' => ['index', 'show']]);
        $this->middleware('permission:create-' . $this->route, ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-' . $this->route, ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-' . $this->route, ['only' => ['delete']]);
    }


    public function configHeaders()
    {
        return [
            [
                'name'    => 'nama',
            ],
            [
                'name'    => 'hp',
                'alias'    => 'HP',
            ],
            [
                'name'    => 'alamat',
                'alias'    => 'Alamat',
            ],
            [
                'name'    => 'icon',
                'alias'    => 'icon',
                'class'    => 'text-center',
            ],
        ];
    }
    public function configSearch()
    {
        return [
            [
                'name'    => 'nama',
                'alias'    => 'Nama',
            ],
            [
                'name'    => 'hp',
                'alias'    => 'HP',
            ]
        ];
    }
    public function configForm()
    {
        return [

            [
                'name'    => 'nama',
                'alias'    => 'Nama Pelanggan',
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'hp',
                'alias'    => 'HP',
                'input'    => 'number',
                'validasi'    => ['required', 'unique', 'min:10', 'max:13'],
            ],
            [
                'name'    => 'alamat',
                'alias'    => 'Alamat',
                'input'    => 'textarea',
                'row'    => '5',
                'validasi'    => ['required'],
            ],
            [
                'name'    => 'username',
                'alias'    => 'Username',
                'validasi'    => ['required', 'unique', 'min:3', 'plural'],
                'extraForm' => 'user',
            ],

            [
                'name'    => 'password',
                'alias'    => 'Password',
                'input'    => 'password',
                'validasi'    => ['required', 'min:8'],
                'extraForm' => 'user',
            ],
            [
                'name'    => 'email',
                'alias'    => 'Email',
                'input'    => 'email',
                'validasi'    => ['required',  'plural', 'unique', 'email'],

                'extraForm' => 'user',
            ],
            [
                'name'    => 'icon',
                'alias'    => 'Icon',
                'validasi'    => ['required', 'plural', 'mimes:jpeg,bmp,png,jpg'],
                'input'    => 'img',
                'extraForm' => 'user',
            ],
            [
                'name'    => 'role_id',
                'input'    => 'combo',
                'alias'    => 'Hak Akses',
                'value' => $this->combobox('Role', 'slug', 'superadmin', '!='),
                'validasi'    => ['required'],
                'extraForm' => 'user',
                'hasMany'    => ['role'],
            ],

        ];
    }

    public function model()
    {
        return new Customer();
    }

    public function detail(Request $request)
    {
        $datapegawai = Pegawai::find($request->id)->append('jabatan');
        if ($datapegawai) {
            $message = "sukses";
            return response()->json(['message' => $message, 'pegawai' => $datapegawai], 200);
        } else {
            $message = "gagal";
            return response()->json(['message' => $message, 'pegawai' => [$datapegawai]], 400);
        }
    }
}
