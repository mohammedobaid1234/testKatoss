@extends('layouts.app')
@section('contnet')
{{-- <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline mr-5">
                    <h3>{{__('cp.edit')}}</h3>
                </div>
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <a  href="" class="btn btn-secondary  mr-2">{{__('cp.cancel')}}</a>
                <button id="submitButton" class="btn btn-success ">{{__('cp.save')}}</button>
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
</div> --}}
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                    <form class="form" method="post" action="" 
                        id="form" role="form" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                    
                        <div class="card-header">
                            <h3 class="card-title">{{__('Main Info')}}</h3>
                        </div>

                        <div class="d-flex">
                            <div class="card card-custom col">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{__('Phone Number')}} 
                                    </h3>
                                </div>
                                 <input type="text" name="mobile_no" class="form-control" value="{{$item->mobile_no}}">   
                            </div> 
                            <div class="card card-custom col">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{__('Email')}} 
                                    </h3>
                                </div>
                                 <input type="text" name="email" class="form-control" value="{{$item->email}}">   
                            </div> 
                        </div>

                        <div class="card card-custom col">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{__('Header Video')}} 
                                </h3>
                            </div>
                             <input type="text" name="header_video" class="form-control" value="{{$item->header_video}}">   
                        </div> 
                        <div class="d-flex">
                            <div class="card card-custom col">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{__('address')}} 
                                    </h3>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="summernote" id="kt_summernote_address"></div>
                                </div>
                            </div> 
                            <div class="card card-custom col">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{__('Copy Right')}} 
                                    </h3>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="summernote" id="kt_summernote_copy_right"></div>
                                </div> 
                            </div> 
                            <div class="card card-custom col">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{__('Schedule')}} 
                                    </h3>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="summernote" id="kt_summernote_Schedule"></div>
                                </div> 
                            </div> 
                        </div>

                        <div class=" d-flex">
                            <div class="card-body  m-0 p-0">    
                                <div class="row">
                                    <div class="card card-custom col">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                {{__('Who Are')}} 
                                            </h3>
                                        </div>
                                        {{-- <div class="form-group"> --}}
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <div class="summernote" id="kt_summernote_who_are"></div>
                                            </div>
                                        {{-- </div> --}}
                                    </div>
                                  
                                    
                                </div>
                            </div>
                            <div class="card-body  m-0 p-0">    
                                <div class="row">
                                    <div class="card card-custom col">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                {{__('Our Vision')}} 
                                            </h3>
                                        </div>
                                        {{-- <div class="form-group"> --}}
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <div class="summernote" id="kt_summernote_our_vision"></div>
                                            </div>
                                        {{-- </div> --}}
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body  m-0 p-0">    
                                <div class="row">
                                    <div class="card card-custom col">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                {{__('Our History') }} 
                                            </h3>
                                        </div>
                                        {{-- <div class="form-group"> --}}
                                            <div class="col-lg-9 col-md-9 col-sm-12">
                                                <div class="summernote" id="kt_summernote_our_history"></div>
                                            </div>
                                        {{-- </div> --}}
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
             
                
                <!--end::Card-->
                <div>
                    <input type="submit" id="btn-submit" class="btn btn-primary">
                </div>
                </form>
             
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('js')
<script>$id = {{$item->id}}</script>
<script src={{asset('assets/js/pages/crud/forms/editors/summernote.js')}}></script>
<script>$who_are = "{{$item->who_are}}"</script>
<script>$our_vision = "{{$item->our_vision}}"</script>
<script>$our_history = "{{$item->our_history}}"</script>
<script>$address = "{{$item->address}}"</script>
<script>$copy_right = "{{$item->copy_right}}"</script>
<script>$Schedule = "{{$item->Schedule}}"</script>
{{-- <script>$aboutUs_ar = "{{$item->about_us}}"</script>
<script>$aboutUs_en = "{{$->about_us}}"</script> --}}
<script>
    setTimeout(() => {
    $('.card-block').css('height', '300px')
        
    }, 1000);
    $('.remomveWhenCol').removeClass('row')

    myDropzone('settings')
    imageRemoveAndAppeared('settings', $id)
    setTimeout(() => {
        $("div[id='kt_summernote_address").summernote('code',htmlDecode($address));
        $("div[id='kt_summernote_who_are").summernote('code',htmlDecode($who_are));
        $("div[id='kt_summernote_our_vision").summernote('code',htmlDecode($our_vision));
        $("div[id='kt_summernote_copy_right").summernote('code',htmlDecode($copy_right));
        $("div[id='kt_summernote_Schedule").summernote('code',htmlDecode($Schedule));
        $("div[id='kt_summernote_our_history").summernote('code',htmlDecode($our_history));
    }, 1000);
    function htmlDecode(input){
        var e = document.createElement('div');
        e.innerHTML = input;
        return e.childNodes.length !== 0 ?  e.childNodes[0].nodeValue : '';
    }
  </script>
<script>
    $("input#btn-submit").on('click', function(event){
        event.preventDefault();
        var $this = $(this).parent().closest('form');
        console.log($this);
        fail = true;
        http.checkRequiredFelids($this);
        if(!fail){
            return true;
        }
        var buttonText = $this.find('input:submit').text();
        data = {
            _token: $("meta[name='csrf-token']").attr("content"),
            who_are:$this.find("div[id='kt_summernote_who_are']").parent('div').find('.card-block').html(),
            our_vision:$this.find("div[id='kt_summernote_our_vision']").parent('div').find('.card-block').html(),
            our_history:$this.find("div[id='kt_summernote_our_history']").parent('div').find('.card-block').html(),
            address:$this.find("div[id='kt_summernote_address']").parent('div').find('.card-block').html(),
            Schedule:$this.find("div[id='kt_summernote_Schedule']").parent('div').find('.card-block').html(),
            copy_right:$this.find("div[id='kt_summernote_copy_right']").parent('div').find('.card-block').html(),
            email: $this.find("input[name='email']").val(),
            mobile_no: $this.find("input[name='mobile_no']").val(),
            header_video: $this.find("input[name='header_video']").val(),

        }
        $this.find("button:submit").attr('disabled', true);
        $this.find("button:submit").html('<span class="fas fa-spinner" data-fa-transform="shrink-3"></span>');

        $.ajax({
            url: $("meta[name='BASE_URL']").attr("content") + '/admin/settings/' + $id,
            type: 'PUT',
            data:data
        })
        .done(function(response) {
            successfullyResponse(response)
        })
        .fail(function (response) {
            http.fail(response.responseJSON, true);
        })
        .always(function () {
            $this.find("button:submit").attr('disabled', false);
            $this.find("button:submit").html(buttonText);
        });
    });
</script>

@endsection