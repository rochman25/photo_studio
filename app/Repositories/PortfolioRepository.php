<?php

namespace App\Repositories;

use App\Models\Portfolio;

class PortfolioRepository {
    protected $portfolio;

    public function __construct(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }

    public function getAll(){
        return $this->portfolio->all();
    }

    public function getById($id){
        return $this->portfolio->find($id);
    }

    public function create($data){
        return $this->portfolio->create([
            "nama" => $data['nama'],
            "caption" => $data['caption'],
            "file_name" => $data['file_name'], 
            "file_path" => $data['file_path'], 
            "file_url" => $data['file_url'], 
            "order" => $data['order']
        ]);
    }

    public function update($data, $id){
        return $this->portfolio->find($id)->update([
            "nama" => $data['nama'],
            "caption" => $data['caption'],
            "file_name" => $data['file_name'], 
            "file_path" => $data['file_path'], 
            "file_url" => $data['file_url'], 
            "order" => $data['order']
        ]);
    }

    public function delete($id){
        return $this->portfolio->find($id)->delete();
    }



}