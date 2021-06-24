<div class="form-group form-textinput">

    <div>
        <label for="{{$item['name']}}" class=" form-control-label">{{$item['alias']}}</label>
    </div>

    @if(!isset($item['input']))
    <input type="text" name="{{$item['name']}}" id="{{$item['name']}}" placeholder="{{$item['alias']}}" class="form-control {{$errors->has($item['name']) ? 'is-invalid' : ''}}" @if($store=="update" ) value="{{$data[$item['name']]}}" @else value="{{old($item['name'])}}" @endif>
    @else

    @if($item['input'] == 'combo')

    <select class="form-control {{$errors->has($item['name']) ? 'is-invalid' : ''}} selected2" @if(isset($item['multiple'])) name="{{$item['name']}}[]" multiple @else name="{{$item['name']}}" @endif id="cmb{{$item['name']}}">
        <option value="">--Pilih {{$item['alias']}}--</option>
        @if (isset($item['value']))
        @foreach($item['value'] as $key => $val)
        @if (isset($val['id']))
        <option value="{{$val['id']}}" @if($store=="update" ) @if (is_array($data[$item['name'].'id'])) {{ in_array($val['id'], $data[$item['name'].'id']) ? 'selected' : ''}} @else {{$data[$item['name']] == $val['id'] ? 'selected' : ''}} @endif @else {{old($item['name']) == $val['id'] ? 'selected' : ''}} @endif>
            @if (isset($val['value']))
            {{ucfirst($val['value'])}}
            @else
            Array salah harus menggunakan value
            @endif
        </option>
        @else
        <option value="{{$val}}" @if($store=="update" ) {{$data[$item['name']] == $val ? 'selected' : ''}} @else {{old($item['name']) == $val ? 'selected' : ''}} @endif>
            {{ucfirst($val)}}
        </option>
        @endif
        @endforeach
        @endif
    </select>

    @endif
    @if($item['input'] == 'radio')
    <div class="row">
        @foreach($item['value'] as $key => $val)

        <div class="col-sm-3">
            <!-- radio -->
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$item['name']}}" value="{{$val}}" @if($store=="update" ) {{$data[$item['name']] == $val ? 'checked' : ''}} @endif>
                    <label class="form-check-label">{{ucfirst($val)}}</label>
                </div>
            </div>
        </div>

        @endforeach
    </div>
    @endif

    @if($item['input'] == 'img' || $item['input'] == 'file')
    <div>
        {{old($item['name'])}}
        <input type="file" name="{{$item['name']}}" id="{{$item['name']}}" required class="form-control" @if($store=="update" ) value="{{$data[$item['name']]}}" @else value="{{old($item['name'])}}" @endif>
    </div>
    @if($item['input'] == 'img' )
    <div class="preview"></div>
    @endif
    @endif

    @if($item['input'] == 'textarea')
    <textarea name="{{$item['name']}}" id="{{$item['name']}}" @if($item['row']) {{$item['row']}} @endif x-webkit-speech placeholder="Speak" class="form-control overflow-auto">@if($store=="update" ){!!$data[$item['name']]!!} @else {!!old($item['name'])!!}@endif
    </textarea>

    @endif

    @if($item['input'] == 'text' || $item['input'] == 'number' || $item['input'] == 'date'|| $item['input'] == 'email' || $item['input'] == 'password' || $item['input'] == 'time')
    <div>
        <input type="{{$item['input']}}" name="{{$item['name']}}" id="{{$item['name']}}" @if($item['input']=='password' ) autocomplete="on" @else placeholder="{{$item['alias']}}" @endif class="form-control {{$errors->has($item['name']) ? 'is-invalid' : ''}}" @if($store=="update" ) value="{{$data[$item['name']]}}" @else value="{{old($item['name'])}}" @endif>
    </div>
    @endif
    @endif

    @if ($errors->has($item['name']))
    <span class="text-danger text-capitalize">
        <strong id="text{{$item['name']}}">
            @if(isset($item['alias']))
            {{$item['alias']}} {{str_replace('_id', '',  $errors->first($item['name']))}}
            @else
            {{str_replace('_id', '',  $errors->first($item['name']))}}
            @endif
        </strong>
    </span>
    @endif
</div>
@push('style')
<style type="text/css">
    .select2-selection--multiple {
        overflow: hidden !important;
        height: auto !important;
    }
</style>
@endpush
<script>
    @push('scriptdinamis')
    @if(isset($item['input']))
    @if($item['input'] == 'combo')
    $("#cmb{{$item['name']}}").select2({
        placeholder: '--- Pilih ' + "{{$item['alias']}}" + ' ---',
        width: '100%'
    });
    $("#cmb{{$item['name']}}").on("change", function(e) {
        $("#{{$item['name']}}").removeClass("is-invalid");
        $("#text{{$item['name']}}").html("");
    });

    @endif
    @if($item['input'] == 'img')

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(".preview").html("<img src='" + e.target.result + "' width='310' id='image'>");
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#{{$item['name']}}").change(function() {
        readURL(this);
        $('.img-responsive').remove();
    });

    $('.close').on('click', function() {
        $('#image').remove();
    });
    @endif
    @endif

    $("#{{$item['name']}}").keypress(function() {

        $("#{{$item['name']}}").removeClass("is-invalid");
        $("#text{{$item['name']}}").html("");
    });
    $("#{{$item['name']}}").change(function() {
        $("#{{$item['name']}}").removeClass("is-invalid");
        $("#text{{$item['name']}}").html("");
    });
    @endpush
</script>