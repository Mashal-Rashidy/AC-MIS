@extends(App::isLocale('en') ? 'layouts.master' : 'layouts.master_rtl')

@section('content')
    <div class="card">
        <div class="card-header">
            <b style="font-size: 24px;">{{ session('sub-menu') }}</b>
        </div>
        <div class="card-body">
            <form method="get" id="main_form" action="{{ route('create.permission') }}">
                @csrf

                <div class="row mb-3" style="text-align: left !important;">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input id="name" type="text" style="direction: ltr !important;" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>
                    </div>
                    <div class="col-md-6" style="text-align: left !important;">
                        <label for="section">Section</label>
                        <select class="form-control" name="section" id="section" required>
                            <option value="" style="direction: ltr !important;">--Select Section--</option>
                            <option value="1" style="direction: ltr !important;">Tashkilat</option>
                            <option value="2" style="direction: ltr !important;">Pezhanton</option>
                            <option value="3" style="direction: ltr !important;">Card</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
{{-- @section('script')
<script>
$(document).ready(function(){
    $(document).on('submit', '#main_form', function(event){
        event.preventDefault();

        var url = $(this).attr('action');
        $.ajax({
            url:url,
            type:'get',
            data:$(this).serialize(),
            dataType:'html',
            beforeSend:function ()
            {
                $('.loader').show();
            },
            success:function (data)
            {
                $('.loader').hide();
            },
            error: function()
            {
                alert('There Is Problem on Processing Your Request Please Contact Database Administrator!');
                $('.loader').hide();
            }
        });
    });
});
</script>
@endsection --}}