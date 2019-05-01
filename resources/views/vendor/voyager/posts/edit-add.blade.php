@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('css')
<style>
    .panel .mce-panel {
        border-left-color: #fff;
        border-right-color: #fff;
    }

    .panel .mce-toolbar,
    .panel .mce-statusbar {
        padding-left: 20px;
    }

    .panel .mce-edit-area,
    .panel .mce-edit-area iframe,
    .panel .mce-edit-area iframe html {
        padding: 0 10px;
        min-height: 350px;
    }

    .mce-content-body {
        color: #555;
        font-size: 14px;
    }

    .panel.is-fullscreen .mce-statusbar {
        position: absolute;
        bottom: 0;
        width: 100%;
        z-index: 200000;
    }

    .panel.is-fullscreen .mce-tinymce {
        height:100%;
    }

    .panel.is-fullscreen .mce-edit-area,
    .panel.is-fullscreen .mce-edit-area iframe,
    .panel.is-fullscreen .mce-edit-area iframe html {
        height: 100%;
        position: absolute;
        width: 99%;
        overflow-y: scroll;
        overflow-x: hidden;
        min-height: 100%;
    }
</style>
@stop

@section('page_header')
<h1 class="page-title">
    <i class="{{ $dataType->icon }}"></i>
    {{ __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
</h1>
@include('voyager::multilingual.language-selector')
@stop

@section('content')
<div class="page-content container-fluid">
    <form class="form-edit-add" role="form" action="@if(isset($dataTypeContent->id)){{ route('voyager.products.update', $dataTypeContent->id) }}@else{{ route('voyager.products.store') }}@endif" method="POST" enctype="multipart/form-data">
        <!-- PUT Method if we are editing -->
        @if(isset($dataTypeContent->id))
        {{ method_field("PUT") }}
        @endif
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-8">
                <!-- ### TITLE ### -->
                <div class="panel">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="voyager-character"></i> {{ __('voyager::post.title') }}
                            <span class="panel-desc"> {{ __('voyager::post.title_sub') }}</span>
                        </h3>
                        <div class="panel-actions">
                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('voyager::multilingual.input-hidden', [
                        '_field_name'  => 'title',
                        '_field_trans' => get_field_translations($dataTypeContent, 'title')
                        ])
                        <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('voyager::generic.title') }}" value="@if(isset($dataTypeContent->title)){{ $dataTypeContent->title }}@endif">
                    </div>
                </div>

                <!-- ### CONTENT ### -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('voyager::post.content') }}</h3>
                        <div class="panel-actions">
                            <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                        </div>
                    </div>

                    <div class="panel-body">
                        @include('voyager::multilingual.input-hidden', [
                        '_field_name'  => 'body',
                        '_field_trans' => get_field_translations($dataTypeContent, 'body')
                        ])
                        @php
                        $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                        $row = $dataTypeRows->where('field', 'body')->first();
                        @endphp
                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                    </div>
                </div><!-- .panel -->

                <!-- ### EXCERPT ### -->
              <!--  <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! __('voyager::post.excerpt') !!}</h3>
                        <div class="panel-actions">
                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('voyager::multilingual.input-hidden', [
                        '_field_name'  => 'excerpt',
                        '_field_trans' => get_field_translations($dataTypeContent, 'excerpt')
                        ])
                        <textarea class="form-control" name="excerpt">@if (isset($dataTypeContent->excerpt)){{ $dataTypeContent->excerpt }}@endif</textarea>
                    </div>
                </div> -->

                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('voyager::post.additional_fields') }}</h3>
                        <div class="panel-actions">
                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @php
                        $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
                        $exclude = ['title', 'body', 'slug', 'status', 'category_id',  'image', 'image_2', 'image_3', 'image_4',];
                        @endphp

                        @foreach($dataTypeRows as $row)
                        @if(!in_array($row->field, $exclude))
                        @php
                        $display_options = isset($row->details->display) ? $row->details->display : NULL;
                        @endphp
                        @if (isset($row->details->formfields_custom))
                        @include('voyager::formfields.custom.' . $row->details->formfields_custom)
                        @else
                        <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                            {{ $row->slugify }}
                            <label for="name">{{ $row->display_name }}</label>
                            @include('voyager::multilingual.input-hidden-bread-edit-add')
                            @if($row->type == 'relationship')
                            @include('voyager::formfields.relationship')
                            @else
                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                            @endif

                            @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                            {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                            @endforeach
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <!-- ### DETAILS ### -->
                <div class="panel panel panel-bordered panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon wb-clipboard"></i> {{ __('voyager::post.details') }}</h3>
                        <div class="panel-actions">
                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="slug">{{ __('voyager::post.slug') }}</label>
                            @include('voyager::multilingual.input-hidden', [
                            '_field_name'  => 'slug',
                            '_field_trans' => get_field_translations($dataTypeContent, 'slug')
                            ])
                            <input type="text" class="form-control" id="slug" name="slug"
                                   placeholder="slug"
                                   {!! isFieldSlugAutoGenerator($dataType, $dataTypeContent, "slug") !!}
                            value="@if(isset($dataTypeContent->slug)){{ $dataTypeContent->slug }}@endif">
                        </div>
                        <div class="form-group">
                            <label for="status">{{ __('voyager::post.status') }}</label>
                            <select class="form-control" name="status">
                                <option value="PUBLISHED"@if(isset($dataTypeContent->status) && $dataTypeContent->status == 'AVAILABLE') selected="selected"@endif>Available</option>
                                <option value="DRAFT"@if(isset($dataTypeContent->status) && $dataTypeContent->status == 'NOT-AVAILABLE') selected="selected"@endif>Not available</option>
                              <!--  <option value="PENDING"@if(isset($dataTypeContent->status) && $dataTypeContent->status == 'PENDING') selected="selected"@endif>{{ __('voyager::post.status_pending') }}</option>-->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">{{ __('voyager::post.category') }}</label>
                            <select class="form-control" name="category_id">
                            @foreach(TCG\Voyager\Models\Category::all() as $category)
                                <option value="{{ $category->id }}"@if(isset($dataTypeContent->category_id) && $dataTypeContent->category_id == $category->id) selected="selected"@endif>{{ $category->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- ### IMAGE ### -->
                <div class="panel panel-bordered panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon wb-image"></i> {{ __('voyager::post.image') }}</h3>
                        <div class="panel-actions">
                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(isset($dataTypeContent->image))
                        <img src="{{ filter_var($dataTypeContent->image, FILTER_VALIDATE_URL) ? $dataTypeContent->image : Voyager::image( $dataTypeContent->image ) }}" style="width:100%" />
                        @endif
                        <input type="file" name="image">
                    </div>
                    <div class="panel-body">
                        @if(isset($dataTypeContent->image_2))
                            <img src="{{ filter_var($dataTypeContent->image_2, FILTER_VALIDATE_URL) ? $dataTypeContent->image_2 : Voyager::image_2( $dataTypeContent->image_2 ) }}" style="width:100%" />
                        @endif
                        <input type="file" name="image_2">
                    </div>
                    <div class="panel-body">
                        @if(isset($dataTypeContent->image_3))
                            <img src="{{ filter_var($dataTypeContent->image_3, FILTER_VALIDATE_URL) ? $dataTypeContent->image_3 : Voyager::image_3( $dataTypeContent->image_3 ) }}" style="width:100%" />
                        @endif
                        <input type="file" name="image_3">
                    </div>
                    <div class="panel-body">
                        @if(isset($dataTypeContent->image_4))
                            <img src="{{ filter_var($dataTypeContent->image_4, FILTER_VALIDATE_URL) ? $dataTypeContent->image_4 : Voyager::image_4( $dataTypeContent->image_4 ) }}" style="width:100%" />
                        @endif
                        <input type="file" name="image_4">
                    </div>
                </div>

                <!-- ### SEO CONTENT ### -->

            </div>
        </div>

        <button type="submit" class="btn btn-primary pull-right">
            @if(isset($dataTypeContent->id)){{ __('voyager::post.update') }}@else <i class="icon wb-plus-circle"></i> {{ __('voyager::post.new') }} @endif
        </button>
    </form>

    <iframe id="form_target" name="form_target" style="display:none"></iframe>
    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
        {{ csrf_field() }}
        <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
    </form>
</div>
@stop

@section('javascript')
<script>
    $('document').ready(function () {
        $('#slug').slugify();

    @if ($isModelTranslatable)
        $('.side-body').multilingual({"editing": true});
    @endif
    });
</script>
@stop
