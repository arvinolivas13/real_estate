<div class="modal fade" id="attachmentModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="height: calc(100% - 57px);">
        <div class="modal-content" style="height:100%;">
            <div class="modal-header">
                <h5>Attachment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height:calc(100% - 100px);">
                <div class="row" style="height:100%;">
                    <div class="col-3">
                        <div class="list-item">
                            <ul>
                                <li id="attachment-image-list">
                                    <a href="#" onclick="viewAttachment('/attachment/sample.jpg', 'jpg')">FOR IMAGE</a>
                                </li>
                                <li id="attachment-pdf-list">
                                    <a href="#" onclick="viewAttachment('/attachment/requirement/8/B26 L6 SHIELA CABALLERO.pdf', 'pdf')">FOR PDF</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-9" style="height:100%;overflow:auto;">
                        <div class="attachment-content">
                            <div class="no_attachment">No Attachment</div>
                            <img id="image_attachment" src="" alt="" style="display:none;"/>
                            <iframe id="pdf_attachment" src="" style="display:none;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Attachment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <form id="modal-form" action="{{url('attachment/save')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Code<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Enter Code/File Name" required>
                        <input type="hidden" class="form-control" id="customer_id" name="customer_id" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Attachment<span style="color: red">*</span></label>
                        <input type="file" class="form-control" id="attachment" name="attachment" style="padding:2px" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary submit-button">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

