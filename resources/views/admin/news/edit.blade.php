@extends('layouts.modal')

@section('contnet')
<form id="target" data-action="news" action="" method="post" class="form-horizontal">
    @csrf
    <div class="form-group row">
        <label for="" class="col-3 control-label">{{__('Label')}}</label>
        <div class="col-7">
            <input required type="text" class="form-control " name="label" value="{{$item->label}}" >
            <p class="invalid-feedback"></p>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-3 control-label">{{__('Body')}}</label>
        <div class="col-7">
            <div class="summernote" id="kt_summernote_body"></div>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-3 control-label">{{__('User Name')}}</label>
        <div class="col-7">
            <input required type="text" class="form-control " name="user_name" value="{{$item->label}}" >
            <p class="invalid-feedback"></p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-offset-2 col-7">
            <input id="btn-submit-modal" value="{{__('Add')}}" hidden type="submit" class="btn btn-primary" >
        </div>
    </div>
</form>
@endsection
@section('js')
<script>$id = {{$item->id}}</script>
<script src={{asset('assets/js/pages/crud/forms/editors/summernote.js')}}></script>

<script>
    imageRemoveAndAppeared('news', $id, 'News Imagw')
    imageRemoveAndAppeared('news/user-images', $id, 'User Image',2)

    myDropzoneForModal('news')
    myDropzoneForModal1('news/user_news', 'user Image')

  </script>
<script>$body = "{{$item->body}}"</script>
<script>
    setTimeout(() => {
    $('.card-block').css('height', '300px')
        
    }, 1000);
    $('.remomveWhenCol').removeClass('row')
    // myDropzone('news')
    // imageRemoveAndAppeared('news', $id)
    setTimeout(() => {
        $("div[id='kt_summernote_body").summernote('code',htmlDecode($body));
    }, 1000);
    function htmlDecode(input){
        var e = document.createElement('div');
        e.innerHTML = input;
        return e.childNodes.length !== 0 ?  e.childNodes[0].nodeValue : '';
    }
  </script>
<script>
    

    $("button#btn-submit").on('click', function(event){

        event.preventDefault();
        var $this = $(this).parent().parent().find('form');
        fail = true;
        http.checkRequiredFelids($this);
        if(!fail){
            return true;
        }
        var buttonText = $this.find('button:submit').text();
        data = {
            _token: $("meta[name='csrf-token']").attr("content"),
            label: $.trim($this.find("input[name='label']").val()),
            user_name: $.trim($this.find("input[name='user_name']").val()),
            body: $this.find("div[id='kt_summernote_body']").parent('div').find('.card-block').html(),

        }
        $this.find("button:submit").attr('disabled', true);
        $this.find("button:submit").html('<span class="fas fa-spinner" data-fa-transform="shrink-3"></span>');

        $.ajax({
            url: $("meta[name='BASE_URL']").attr("content") + '/admin/news/' + $id,
            type: 'PUT',
            data:data
        })
        .done(function(response) {
            if($myDropzone.files.length  != 0){
                $myDropzone.userId = response.data.id
                // $myDropzone._token =  $("meta[name='csrf-token']").attr("content")
                $myDropzone.processQueue();
                $myDropzone.on("complete", function (file) {
                    if ($myDropzone.getUploadingFiles().length === 0 && $myDropzone.getQueuedFiles().length === 0) {
                        http.success({ 'message': response.message });
                        // window.location.reload();
                    }
                });
            }
            if($myDropzone1.files.length  != 0){
                $myDropzone1.userId = response.data.id
                // $myDropzone1._token =  $("meta[name='csrf-token']").attr("content")
                $myDropzone1.processQueue();
                $myDropzone1.on("complete", function (file) {
                    if ($myDropzone1.getUploadingFiles().length === 0 && $myDropzone1.getQueuedFiles().length === 0) {
                        http.success({ 'message': response.message });
                        // window.location.reload();
                    }
                });
            }
            else{
                http.success({ 'message': response.message });
                // window.location.reload();
            }
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