<?php

namespace App\Http\Controllers\Api\DataTables;

use App\Listing;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserUnpublishedController extends DataTableController
{
    protected $allowCreation = false;
    protected $allowDeletion = true;
    protected $allowQuickEdit = true;
    protected $allowFullEdit = true;
    protected $searchable = true;
    protected $modalText = null;
    protected $editModalPath = 'dashboard/listings';


    /**
     * @inheritDoc
     */
    public function builder()
    {
        return Listing::query();
    }

    /**
     * @param Builder $builder
     * @param Request $request
     * @return Builder
     */
    protected function subQuery(Builder $builder, Request $request)
    {
        return $builder->where('user_id', $request->user()->id)->isNotLive();

    }

    /**
     * @return array
     */
    protected function getUpdatableColumns()
    {
        return ['title'];
    }

    /**
     * @return array
     */
    protected function getDisplayableColumns()
    {
        return ['id','title', 'key'];
    }

    /**
     * @return array
     */
    public function getCustomColumnNames()
    {
        return ['id' => 'ID', 'title' => 'Title'];
    }

    /**
     * @return array
     */
    public function getFormFieldTypes()
    {
        return ['id' => 'text', 'title' => 'text'];
    }


}
