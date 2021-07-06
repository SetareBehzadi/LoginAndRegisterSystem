<div class="modal fade" id="fileDetail" tabindex="-1"
     role="dialog"
     aria-labelledby="myModalLabel"
     aria-hidden="true" data-keyboard="false"
     data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">
                    {{$fileName}}
                </h4>
            </div>
            <div class="modal-body">

            {{$fileText}}

            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default deleteBtn"
                        data-dismiss="modal">close
                </button>
            </div>
        </div>
    </div>
</div>