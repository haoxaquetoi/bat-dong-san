<div class="modal fade" tabindex="-1" role="dialog" id="modalFeedback">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thông tin chi tiết góp ý</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4 col-xs-12 control-label">Tiêu đề tin bài</label>
                    <div class="col-sm-8 col-xs-12 padding-top-7">
                        <a>@{{data.singlePostFb.postTitle}}</a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 col-xs-12 control-label">Tiêu đề/Nội dung góp ý</label>
                    <div class="col-sm-8 col-xs-12 padding-top-7">
                        <a>@{{data.singlePostFb.title != ''  ? data.singlePostFb.feedbackTitle  :data.singlePostFb.value}}</a>
                    </div>
                </div>               
                <div class="form-group">
                    <label class="col-sm-4 col-xs-12 control-label">Thời gian gửi</label>
                    <div class="col-sm-8 col-xs-12 padding-top-7">
                        @{{data.singlePostFb.created_at_dmY}}
                    </div>
                </div>
                <div class="form-group">
                        <label class="col-sm-4 col-xs-12 control-label">Trạng thái</label>
                        <div class="col-sm-8 col-xs-12 padding-top-7">
                            @{{data.singlePostFb.readed ==1 ?'Đã đọc' : 'Chưa đọc'}}
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close" ><i class="fa fa-close"></i>&nbsp;Đóng</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
