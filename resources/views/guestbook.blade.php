@extends('layouts.home')

@section('body')
<div class="jumbotron">
    <div class="container">
        <h1>{{ __('guestbook.guestbook') }}</h1>
        <p>{{ __('guestbook.guestbook_desc') }}</p>
        <p><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#donate-modal">{{ __('guestbook.donate') }}</button></p>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="donate-modal" tabindex="-1" role="dialog" aria-labelledby="donate-modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donate-modal-label">{{ __('guestbook.donate_modal_title') }}</h4>
            </div>
            <div class="modal-body">
                <p class="text-justify">{{ __('guestbook.donate_modal_body') }}</p>
                <div class="row text-center">
                    <div class="col-md-6">
                        <h2>{{ __('guestbook.wechat') }}</h2>
                        <p><img src="/images/wechat.png" alt="wechat" /></p>
                    </div>
                    <div class="col-md-6">
                        <h2>{{ __('guestbook.alipay') }}</h2>
                        <p><img src="/images/alipay.png" alt="alipay" /></p>
                    </div>
                </div>
                <p class="text-justify">{{ __('guestbook.donate_modal_body_thank_you') }} <span class="fa fa-heart" aria-hidden="true"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('guestbook.donate_modal_footer_button_close') }}</button>
            </div>
        </div>
    </div>
</div>

<!-- Comment -->
<div class="container">
    @include('layouts.disqus')
</div>
@stop
