<div class="modal" tabindex="-1" id="importModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('products.titles.import')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="importProductsForm" action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="importFile" id="importFile">
                        <label class="custom-file-label" for="importFile">@lang('common.actions.choose-file')</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('common.actions.close')</button>
                <button type="submit" form="importProductsForm" class="btn btn-primary">@lang('common.actions.import')</button>
            </div>
        </div>
    </div>
</div>
