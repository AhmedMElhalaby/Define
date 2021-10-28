<div class="col-md-12" data-name-filed="{{$Field['name']}}">

    <div class="{{isset($Field['translate'])  ? 'col-md-10':' col-md-12'}} " data-name-filed="{{$Field['name']}}">
        <div class="form-group label-floating">
            <label for="{{$Field['name']}}"
                   class="control-label">{{__('crud.'.$lang.'.'.$Field['name'])}} @if($Field['is_required'])
                    *@endif</label>
            @if(isset($Field['editor']))
                <textarea  name="{{$Field['name']}}"  @if($Field['is_required']) required
                      @endif  id="summernote" name="editordata">{{$value}}</textarea>

            @else
            <textarea id="{{$Field['name']}}" name="{{$Field['name']}}" @if($Field['is_required']) required
                      @endif class="form-control {{ $errors->has($Field['name']) ? ' is-invalid' : '' }}">{{$value}}</textarea>
            @endif
        </div>
        @if ($errors->has($Field['name']))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($Field['name']) }}</strong>
        </span>
        @endif


    </div>
    @if(isset($Field['translate'])  &&  $Field['translate'])
        <div class="col-md-2">
            <div class="btn btn-primary no-text ticket-manage new_option_translate "
                 id="">
                {{__('admin.add_lang')}}
            </div>
        </div>
    @endif

</div>

@if(isset($Field['translate'])  &&  $Field['translate'])
    <div id="" class=" {{$Field['name']}}" style="display: none">
        @foreach(\App\Models\Language::all() as $languages)
            @if($languages->code != 'en')
                            <?php $ObjectTranslation = null ?>

                @if($Object !=  null )

                    <?php
                    $ObjectTranslation = \App\Models\Translation::where('ref_id', '=', $Object->id)->where('language_id', '=', $languages->id)->where('column', '=', $Field['name'])->where('model_type', '=', $lang)->first();
                    ?>
                @endif
                <div class="col-md-12">
                    <div class="row" id="">
                        <div class="col-md-5">
                            <div class="form-group label-floating">
                                <label for="{{$Field['name']}}" class="control-label">Language</label>
                                <select name="Language[{{$Field['name']}}][]" style="margin: 0;padding: 0"
                                        id="{{$Field['name']}}"
                                        class="form-control">
                                    <option value=""></option>
                                    @foreach(\App\Models\Language::all() as $Language)
                                        @if($Language->code != 'en')

                                            <option value="{{$Language->id}}"
                                                    {{$Language->id}} data-s="{{$languages->id }}"
                                                {{$Language->id == $languages->id &&  $ObjectTranslation  ? 'selected':'' }}
                                            > {{$Language->english_name}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group label-floating">
                                <label for="{{$Field['name']}}"
                                       class="control-label">{{__('crud.'.$lang.'.'.$Field['name'])}} </label>
                                <input type="text" id="{{$Field['name']}}" name="{{$Field['name']}}_translate[]"
                                       class="form-control {{ $errors->has($Field['name']) ? ' is-invalid' : '' }}"
                                       value="{{ $ObjectTranslation  ? $ObjectTranslation->translation : ''}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="btn btn-danger no-text ticket-manage remove_field_translate"
                                 id="{{ $loop->index}}">
                                {{__('admin.delete')}}
                            </div>
                        </div>

                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endif
