<div class="modal fade" id="donate-modal" tabindex="-1" role="dialog" aria-labelledby="donate-modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donate-modal-label">{{ __('donate-modal.title') }}</h4>
            </div>
            <div class="modal-body">
                <p class="text-justify">{{ __('donate-modal.body') }}</p>
                <div class="row text-center">
                    <div class="col-md-6">
                        <h2>{{ __('donate-modal.wechat') }}</h2>
                        <p><img src="/images/wechat.png" alt="wechat" /></p>
                    </div>
                    <div class="col-md-6">
                        <h2>{{ __('donate-modal.alipay') }}</h2>
                        <p><img src="/images/alipay.png" alt="alipay" /></p>
                    </div>
                </div>
                <p class="text-justify">{{ __('donate-modal.body_thank_you') }} <span class="fa fa-heart" aria-hidden="true"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('donate-modal.footer_button_close') }}</button>
            </div>
        </div>
    </div>
</div>
