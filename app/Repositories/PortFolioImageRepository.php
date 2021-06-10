<?php

namespace App\Repositories;

use App\Models\PortfolioImage;

class PortFolioImageRepository {
    protected $portfolioImage;

    public function __construct(PortfolioImage $portfolioImage)
    {
        $this->portfolioImage = $portfolioImage;
    }

    public function bulkInsert(){

    }

    public function getByPortFolioId($id){
        return $this->portfolioImage->where('portfolio_id',$id)->get();
    }

    public function deleteByPortfolioId($id){
        return $this->portfolioImage->where('portfolio_id',$id)->delete();
    }
}