<?php

namespace App\Http\Controllers\Api\DataTables;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

abstract class DataTableController extends Controller
{

    protected $allowCreation = false;
    protected $allowDeletion = false;
    protected $allowQuickEdit = true;
    protected $allowFullEdit = true;
    protected $searchable = false;
    protected $modalText = null;
    protected $editModalPath = null;

    protected $builder;

    /**
     * [builder description]
     * @return [type] [description]
     */
    abstract public function builder();

    /**
     * return builder
     */
    public function __construct()
    {
        $builder = $this->builder();

        if (!$builder instanceof Builder){
            throw new Exception('Entity builder not instance of Builder');
        }
        $this->builder = $builder;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return response()->json([
            'data' => [
                'table' => $this->getCustomTableName(),
                'displayable' => array_values($this->getDisplayableColumns()),
                'updatable' => array_values($this->getUpdatableColumns()),
                'records' => $this->records($request),
                'custom_columns' => $this->getCustomColumnNames(),
                'modal_text' => $this->modalText,
                'form_field_type' => $this->getFormFieldTypes(),
                'edit_path' => ($this->editModalPath !== null) ? $this->editModalPath : $this->builder->getModel()->getTable() ,
                'allow' => [
                    'creation' => $this->allowCreation,
                    'deletion' => $this->allowDeletion,
                    'searchable' => $this->searchable,
                    'quick_edit' => $this->allowQuickEdit,
                    'full_edit' => $this->allowFullEdit,
                ],
                'hide' => $this->hide()
            ]
        ]);
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function update($id, Request $request)
    {
        $this->builder->find($id)->update($request->only($this->getUpdatableColumns()));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        if (!$this->allowCreation) {
            return;
        }
        $this->builder->create($request->only($this->getUpdatableColumns()));
    }

    /**
     * @param $ids
     * @param Request $request
     */
    public function destroy($ids, Request $request)
    {
        if (!$this->allowDeletion) {
            return;
        }
        $this->builder->whereIn('id', explode(',', $ids))->delete();
    }

    /**
     * @return string
     */
    public function getCustomTableName()
    {
        return $this->builder->getModel()->getTable();
    }

    /**
     * @return array
     */
    public function getCustomColumnNames()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getFormFieldTypes()
    {
        return [];
    }

    /**
     * Display all column of model except the hidden columns
     * @return array
     */
    protected function getDisplayableColumns()
    {
        return array_values(array_diff($this->getDatabaseColumnNames(), $this->builder->getModel()->getHidden()));
    }

    /**
     * List out updatable columns
     * @return array
     */
    protected function getUpdatableColumns()
    {
        return $this->getDisplayableColumns();
    }

    /**
     * Get column names form model
     * @return [type] [description]
     */
    protected function getDatabaseColumnNames()
    {
        return Schema::getColumnListing($this->builder->getModel()->getTable());
    }

    /**
     * Get all records on Model
     * @return [type] [description]
     */
    protected function records(Request $request)
    {
        $builder =  $this->subQuery($this->builder, $request);

        if ($this->hasSearchQuery($request)) {
            $builder = $this->buildSearch($builder, $request);
        }

        try {
            return $this->builder->limit($request->limit)->orderBy('id')->paginate($request->limit, $this->getDisplayableColumns());

        } catch (QueryException $e) {
            return [];
        }
    }

    /**
     * [hasSearchQuery description]
     * @param  Request $request [description]
     * @return boolean          [description]
     */
    protected function hasSearchQuery(Request $request)
    {
        $count = count(array_filter($request->only(['column', 'operator', 'value'])));
        return  $count === 3;
    }

    /**
     * @return array
     */
    protected function hide()
    {
        return $this->getHiddenFields();
    }

    /**
     * @return array
     */
    public function getHiddenFields()
    {
        return ['header', 'footer'];
    }

    /**
     * @param Builder $builder
     * @param Request $request
     * @return Builder
     */
    protected function buildSearch(Builder $builder, Request $request)
    {
        $queryParts = $this->resolveQueryParts($request->operator, $request->value);
        return $builder->where($request->column, $queryParts['operator'], $queryParts['value']);
    }

    /**
     * @param Builder $builder
     * @param Request $request
     * @return Builder
     */
    protected function subQuery(Builder $builder, Request $request)
    {
        return $builder;
    }

    /**
     * @param $operator
     * @param $value
     * @return mixed
     */
    protected function resolveQueryParts($operator, $value)
    {
        return Arr::get([
            'equels' => [
                'operator' => '=',
                'value' => $value
            ],
            'contains' => [
                'operator' => 'LIKE',
                'value' => "%{$value}%"
            ],
            'starts_with' => [
                'operator' => 'LIKE',
                'value' => "{$value}%"
            ],
            'ends_with' => [
                'operator' => 'LIKE',
                'value' => "%{$value}"
            ],
            'greater_than' => [
                'operator' => '>',
                'value' => $value
            ],
            'less_than' => [
                'operator' => '<',
                'value' => $value
            ],
        ], $operator);
    }

}
