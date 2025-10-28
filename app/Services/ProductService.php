<?php

namespace App\Services;

use App\Models\Profil;
use Illuminate\Support\Str;

class ProfilService extends Service
{
    public function search($params = [])
    {
        $buyer = Profil::orderBy('id');

        $buyer = $this->searchFilter($params, $buyer, []);
        return $this->searchResponse($params, $buyer);
    }

    public function find($value, $column = 'id')
    {
        return Profil::where($column, $value)->first();
    }

    public function store($params)
    {
        $params = $this->cleanDate($params, ['tanggal_lahir']);
        $params['uuid'] = Str::uuid();
        return Profil::create($params);
    }

    public function update($params, $id)
    {
        $params = $this->cleanDate($params, ['tanggal_lahir']);
        $buyer = Profil::find($id);
        if (!empty($buyer)) $buyer->update($params);
        return $buyer;
    }

    public function delete($id)
    {
        $buyer = Profil::find($id);
        if (!empty($buyer)) {
            try {
                $buyer->delete();
                return true;
            } catch (\Throwable $e) {
                return ['error' => 'Delete user failed! This user currently being used'];
            }
        }
        return $buyer;
    }

}