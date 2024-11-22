<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class UserController extends Controller
{
    private $user;
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->user = $userRepositoryInterface;
    }
    public function userById(Request $request)
    {
        $id = $request->id;
        $user = $this->user->find($id,['role']);
        return response()->json($user);
    }
    public function userWithDatatable(Request $request)
    {
        $postData = $request->all();

        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length'];

        $columnIndex = isset($postData['order'][0]['column'])? $postData['order'][0]['column']:0;
        $columnName = isset($postData['columns'][$columnIndex]['data'])?$postData['columns'][$columnIndex]['data']:'';
        $columnSortOrder = isset($postData['order'][0]['dir'])?$postData['order'][0]['dir']:'asc';
        $searchValue = $postData['search']['value'];
        $param = [
            "columnName"=>$columnName,
            "columnSortOrder"=>$columnSortOrder,
            "searchValue"=>$searchValue,
            "rowperpage"=>$rowperpage
        ];

        $searchField = [
            'name','email'
        ];
        $relationship = [
            'role'
        ];
        $totalRecordSwithFilter = $totalRecords = $this->user->getAll($param,$searchField,$relationship)->count();
        $records = $this->user->paginate($param,$searchField,$relationship);

        return [
            "aaData"=>$records,
            "draw"=>$draw,
            "iTotalRecords"=>$totalRecords,
            "iTotalDisplayRecords"=>$totalRecordSwithFilter
        ];
    }
    public function updateApi(Request $request)
    {
        $data = $request->all();
        $update = [
            'email'=>$data['email'],
            'name'=>$data['name'],
            'roles_id'=>$data['roles_id']
        ];
        try {
            $this->user->update($data['userId'],$update);
            return response()->json([
                'message'=>'Update Complete',
                'code'=>200
            ]);
        } catch (\Exception $e) {
           return response()->json([
            'message'=>'Update Not Complete',
            'code'=>500,
            'error'=>$e->getMessage(),
            ]);
        }
    }
    public function deleteApi(Request $request)
    {
        $data = $request->all();
        $userId = $data['userId'];
        if (!$userId) {
           return response()->json([
            'message'=>'Not found Data',
            'code'=>404,
           ],404);
        }
        try {
         $user = $this->user->find($userId);
         $user->delete();
            return response()->json([
                'message'=>'Delete Success',
                'code'=>200
            ],200);
        } catch (ModelNotFoundException $e) {
           return response()->json([
            'message'=>'Not Found',
            'code'=>404,
            ],404);
        } catch(\Exception $e){
            return response()->json([
                'message'=>'Delete Fail',
                'code'=>500,
                'error'=>$e->getMessage()
            ],500);
        }
    }
}
