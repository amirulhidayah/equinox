<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\Negara;
use App\Models\Prodi;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function listFakultas()
    {
        $dataFakultas = Fakultas::orderBy('nama', 'asc')->get();

        // $html = '<option hidden selected value="">' . __('components/list.placeholderFakultas') . '</option>';
        $html = '<option></option>';
        if ($dataFakultas) {
            foreach ($dataFakultas as $fakultas) {
                $html .= '<option value="' . $fakultas->id . '">' . $fakultas->nama . '</option>';
            }
        }
        return response()->json(
            [
                'res' => 'success',
                'html' => $html
            ]
        );
    }

    public function listProdi(Request $request)
    {
        $dataProdi = Prodi::where('fakultas_id', $request->idFakultas)->get();

        $request->role == 'Unit Kerja' ? $dataProdi = $dataProdi->where('is_unit_kerja', 1) : $dataProdi = $dataProdi;

        // $html = '<option hidden selected value="">' . __('components/list.placeholderProdi') . '</option>';
        $html = '<option></option>';
        if ($dataProdi) {
            foreach ($dataProdi as $prodi) {
                $html .= '<option value="' . $prodi->id . '">' . $prodi->nama . '</option>';
            }
        }
        return response()->json(
            [
                'res' => 'success',
                'html' => $html
            ]
        );
    }

    public function listNegara(Request $request)
    {
        $dataNegara = Negara::where('region', $request->region)->get();

        $html = '<option></option>';
        if ($dataNegara) {
            foreach ($dataNegara as $negara) {
                $html .= '<option value="' . $negara->id . '">' . $negara->nama . '</option>';
            }
        }
        return response()->json(
            [
                'res' => 'success',
                'html' => $html
            ]
        );
    }

    public function listProvinsi(Request $request)
    {
        $dataProvinsi = Provinsi::where('negara_id', $request->negara)->get();

        if ($dataProvinsi->isEmpty()) {
            $html = '<label for="inputPassword4">' . __('pages/master/pengusul.provinsi') . '</label><input type="text" class="form-control" id="provinsi" placeholder="' . __('pages/master/pengusul.placeholderProvinsi') . '"><span class="text-danger error-text provinsi-error"></span>';
            $type = 'input';
        } else {
            $html = '<label for="inputPassword4">' . __('pages/master/pengusul.provinsi') . '</label>
                                <select class="form-control" id="provinsi" class="provinsi" style="text-transform : capitalize" onchange="getListKota()">';

            $html .= '<option value=""></option>';
            foreach ($dataProvinsi as $provinsi) {
                $html .= '<option value="' . $provinsi->id . '">' . $provinsi->nama . '</option>';
            }

            $html .= '</select><span class="text-danger error-text provinsi-error"></span>';
            $type = 'select';
        }

        return response()->json(
            [
                'res' => 'success',
                'html' => $html,
                'type' => $type
            ]
        );
    }

    public function listKota(Request $request)
    {
        $dataKota = Kota::where('provinsi_id', $request->provinsi)->orderBy('nama', 'asc')->get();

        if ($dataKota->isEmpty()) {
            $html = '<label for="inputPassword4">' . __('pages/master/pengusul.kota') . '</label><input type="text" class="form-control" id="kota" placeholder="' . __('pages/master/pengusul.placeholderKota') . '"><span class="text-danger error-text kota-error"></span>';
            $type = 'input';
        } else {
            $html = '<label for="inputPassword4">' . __('pages/master/pengusul.kota') . '</label>
                                <select class="form-control" id="kota" class="kota" style="text-transform : capitalize" onchange="getListKecamatan()">';

            $html .= '<option value=""></option>';
            foreach ($dataKota as $kota) {
                $html .= '<option value="' . $kota->id . '">' . $kota->nama . '</option>';
            }

            $html .= '</select><span class="text-danger error-text kota-error"></span>';
            $type = 'select';
        }

        return response()->json(
            [
                'res' => 'success',
                'html' => $html,
                'type' => $type
            ]
        );
    }

    public function listKecamatan(Request $request)
    {
        $dataKecamatan = Kecamatan::where('kota_id', $request->kota)->orderBy('nama', 'asc')->get();

        if ($dataKecamatan->isEmpty()) {
            $html = '<label for="inputPassword4">' . __('pages/master/pengusul.kecamatan') . '</label><input type="text" class="form-control" id="kecamatan" placeholder="' . __('pages/master/pengusul.placeholderKecamatan') . '"><span class="text-danger error-text kecamatan-error"></span>';
            $type = 'input';
        } else {
            $html = '<label for="inputPassword4">' . __('pages/master/pengusul.kecamatan') . '</label>
                                <select class="form-control" id="kecamatan" class="kecamatan" style="text-transform : capitalize" onchange="getListKelurahan()">';

            $html .= '<option value=""></option>';
            foreach ($dataKecamatan as $kecamatan) {
                $html .= '<option value="' . $kecamatan->id . '">' . $kecamatan->nama . '</option>';
            }

            $html .= '</select><span class="text-danger error-text kecamatan-error"></span>';
            $type = 'select';
        }

        return response()->json(
            [
                'res' => 'success',
                'html' => $html,
                'type' => $type
            ]
        );
    }

    public function listKelurahan(Request $request)
    {
        $dataKelurahan = Kelurahan::where('kecamatan_id', $request->kecamatan)->orderBy('nama', 'asc')->get();

        if ($dataKelurahan->isEmpty()) {
            $html = '<label for="inputPassword4">' . __('pages/master/pengusul.kelurahan') . '</label><input type="text" class="form-control" id="kelurahan" placeholder="' . __('pages/master/pengusul.placeholderKelurahan') . '"><span class="text-danger error-text kelurahan-error"></span>';
            $type = 'input';
        } else {
            $html = '<label for="inputPassword4">' . __('pages/master/pengusul.kelurahan') . '</label>
                                <select class="form-control" id="kelurahan" class="kelurahan" style="text-transform : capitalize" >';

            $html .= '<option value=""></option>';
            foreach ($dataKelurahan as $kelurahan) {
                $html .= '<option value="' . $kelurahan->id . '">' . $kelurahan->nama . '</option>';
            }

            $html .= '</select><span class="text-danger error-text kelurahan-error"></span>';
            $type = 'select';
        }

        return response()->json(
            [
                'res' => 'success',
                'html' => $html,
                'type' => $type
            ]
        );
    }
}