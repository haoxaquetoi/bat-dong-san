<?php

namespace App\Http\Controllers\Backend\Rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\FeedbackModel;
use App\Models\Backend\FeedbackArticleModel;
use Validator;

class FeedbackCtrl extends Controller {
    
    /**
     * thuc hien insert feedback
     * @param Request $request
     * @return type
     */
    function insertFeedback(Request $request) {
        //validate
        $this->_validateUpdate($request);
        //thuc hien insert
        $newId = FeedbackModel::insertGetId([
                    'name' => $request->name,
                    'order' => $request->order,
                    'status' => $request->status? 1: 0,
                    'created_at' => Date('Y-m-d H:i:s'),
                    'updated_at' => Date('Y-m-d H:i:s'),
        ]);
        //reorder
        $this->_reOrder($newId, $request->order);
        
        return response()->json(['id' => $newId]);
    }
    
    /**
     * thuc hien lay thong tin feedback
     * @param type $id
     * @return type
     */
    function infoFeedback($id) {
        //validate id
        $this->_validateId($id);
        
        //get info
        $data = FeedbackModel::find($id);
        return response()->json($data);
    }
    
    
    /**
     * danh sach feedback
     * @param Request $request
     * @param FeedbackModel $feedbackModel
     * @return type
     */
    function listFeedback(Request $request, FeedbackModel $feedbackModel) {
        $freeText = $request->freeText;
        $data = $feedbackModel
                ->filterFreeText($request->freeText)
                ->where('deleted', '<>', '1')
                ->orderBy('order')
                ->paginate();
        return response()->json($data);
    }
    
    /**
     * thuc hien update feedback
     * @param Request $request
     * @return type
     */
    function updateFeedback(Request $request) {
        
        //validate
        $this->_validateId($request->id);
        $this->_validateUpdate($request);
        
        //update
        $infoFeedback = FeedbackModel::find($request->id);
        $infoFeedback->name = $request->name;
        $infoFeedback->order = $request->order;
        $infoFeedback->status = $request->status? 1: 0;
        $infoFeedback->updated_at = Date('Y-m-d H:i:s');
        $status = $infoFeedback->save();
        //order
        $this->_reOrder($infoFeedback->id, $infoFeedback->order);
        
        return response()->json(['status' => $status]);
        
    }

    /**
     * thuc hien xoa feedback
     * @param type $id
     * @return type
     */
    function deleteFeedback($id) {
        //validate id
        $this->_validateId($id);
        //kiem tra feedback da co người dùng chưa
        $countFeedBackArticle = FeedbackArticleModel::where('feedback_id', $id)->get()->count();
        $hasFeedback = ($countFeedBackArticle > 0)? true: false;
        if(!$hasFeedback)
        {
            $status = FeedbackModel::find($id)->delete();
        }
        else
        {
            $feedbackInfo = FeedbackModel::find($id);
            $feedbackInfo->deleted = 1;
            $feedbackInfo->deleted_at = date('Y-m-d H:i:s');
            
            $status = $feedbackInfo->save();
        }
        return response()->json(['status' => $status]);
    }
    
    /**
     * Thuc hien reorder feedback
     * @param type $id
     * @param type $order
     */
    private function _reOrder($id, $order) {
        $listOrder = FeedbackModel::where('id', '<>', $id)->orderBy('order')->get();
        
        foreach($listOrder as $feedback){
            if((int)$feedback->order >= $order)
            {
                $feedback->order = $order + 1;
                $order = $order + 1;
                $feedback->save();
            }
        }
    }
    
    /**
     * thuc hien validate id
     * @param type $id
     */
    private function _validateId($id) {
        Validator::make(
            ['id' => $id],
            ['id' => 'required|exists:feedback,id'],
            [
                'id.required' => 'id không được bỏ trống',
                'id.exists' => 'id không tồn tại',
            ]
        )->validate();
    }
    
    /**
     * validate when update
     * @param type $request
     */
    private function _validateUpdate($request){
        Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'order' => 'required|numeric',
                'status' => 'required|boolean',
            ],
            [
                'name.require' => 'Tên feedback không được bỏ trống',
                'order.require' => 'order feedback không được bỏ trống',
                'status.require' => 'status feedback không được bỏ trống',
                'order.numeric' => 'Định dạng order sai',
                'status.boolean' => 'Định dạng status sai',
            ]
        )->validate();
    }

}
