@extends('app')

@section('content')

    @include('_tiles.new-tiles')
    {{-- Add tiles with tiles.new.tile --}}
    @include('_tiles.new-tile',[
            'url' => 'family/identification/' . $family_id,
            'column_size' => 'col-md-3',
            'color' => 'info',
            'icon' => 'group',
            'title' => 'Back',
            'body' => 'to Family'
    ])

    @include('_tiles.end-new-tiles')

    @include('_content.title',['heading' => 'Create New Identification','body' => 'This identification is for ' . $record->full_name_fl])

    <br/>

    @include('_forms.new-head',['color' => 'panel-info'])

    @include('_forms.new-row')
    @include('_forms.new-column',['column_size' => 'col-md-12'])
    {!! Form::open(['files' => true,'id' => 'admin-form','url' => 'identification/store?table_type=' . $table_type . '&id=' . $id]) !!}
    @include('_forms.new-body')
    <!----------------------------------------------------------------------------->
    <!-----------------------New id_type select------------------------------------->
    @include(('_forms.new-section'))
    {!! Form::label('id_type','Type of Document') !!}
    @include('_forms.new-label',['icon_placement' => '','class' => 'select'])
    {{-- select('name','select_array','default value','other') --}}
    {!! Form::select('id_type', $id_type_dropdown, null, ['id' => 'id_type','placeholder' => '']) !!}
    <i class="arrow"></i>
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->


    <div id="display_visa_dropdown" style="display: none">
        <!----------------------------------------------------------------------------->
        <!-----------------------New visa_type_id select------------------------------------->
        @include(('_forms.new-section'))
        {!! Form::label('visa_type_id','If document is a Visa, please select the Visa Type.') !!}
        @include('_forms.new-label',['icon_placement' => '','class' => 'select'])
        {{-- select('name','select_array','default value','other') --}}
        {!! Form::select('visa_type_id', $visa_dropdown, null, ['id' => 'visa_type_id','placeholder' => '']) !!}
        <i class="arrow"></i>

        @include('_forms.end-new-label')
        @include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
        <!----------------------------------------------------------------------------->
    </div>

    <div id="display_idcard_dropdown" style="display: none">

        <!----------------------------------------------------------------------------->
        <!-----------------------New idcard_type_id select------------------------------------->
        @include(('_forms.new-section'))
        {!! Form::label('idcard_type_id','ID Card Type') !!}
        @include('_forms.new-label',['icon_placement' => '','class' => 'select'])
        {{-- select('name','select_array','default value','other') --}}
        {!! Form::select('idcard_type_id', $idcard_dropdown, null, ['id' => 'idcard_type_id','placeholder' => '']) !!}
        <i class="arrow"></i>
        @include('_forms.end-new-label')
        @include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
        <!----------------------------------------------------------------------------->
    </div>


    <div id="display_country_dropdown">
        <!----------------------------------------------------------------------------->
        <!-----------------------New id_country_id select------------------------------------->
        @include(('_forms.new-section'))
        {!! Form::label('id_country_id','Country') !!}
        @include('_forms.new-label',['icon_placement' => '','class' => 'select'])
        {{-- select('name','select_array','default value','other') --}}
        {!! Form::select('id_country_id', $country_dropdown, null, ['id' => 'id_country_id','placeholder' => ''])
        !!}
        <i class="arrow"></i>
        @include('_forms.end-new-label')
        @include('_forms.end-new-section')
        <!----------------------------------------------------------------------------->
        <!----------------------------------------------------------------------------->
    </div>

    <!----------------------------------------------------------------------------->
    <!---------------------------New id_number text field----------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('id_number','Document ID Number') !!}
    {!! Form::text('id_number',null,['class' => 'gui-input','id' => 'id_number','placeholder' => '']) !!}
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->


    <!----------------------------------------------------------------------------->
    <!---------------------------New id_issue_date date field----------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('id_issue_date','Issue Date - Optional') !!}
    {!! Form::text('id_issue_date',null,['class' => 'form-control date','id' => 'id_issue_date', 'placeholder' => 'mm/dd/yyyy']) !!}

    @include('_forms.input-footer',['title' => 'Note:','message' => 'The proper format is mm/dd/yyyy where m=Month d=Day y=Year.'])
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!---------------------------New id_expiration_date date field----------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('id_expiration_date','Expiration Date - Optional') !!}
    {!! Form::text('id_expiration_date',null,['class' => 'form-control date','id' => 'id_expiration_date', 'placeholder' => 'mm/dd/yyyy']) !!}

    @include('_forms.input-footer',['title' => 'Note:','message' => 'The proper format is mm/dd/yyyy where m=Month d=Day y=Year.'])
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!---------------------------New id_last_name text field----------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('id_last_name','Last Name (Family / Surname Name)') !!}
    {!! Form::text('id_last_name',null,['class' => 'gui-input','id' => 'id_last_name','placeholder' => 'Must be written EXACTLY like the passport or visa name. ']) !!}
    <!---- ADD INPUT FOOTER form.inputfooter---->
    @include('_forms.input-footer',['title' => 'Note:','message' => 'Must be written EXACTLY like the passport or visa name.<br /><strong>ONLY PINYIN OR ENGLISH</strong>'])
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!---------------------------New id_first_name text field----------------------------->
    @include(('_forms.new-section'))
    @include('_forms.new-label',['icon_placement' => ''])
    {!! Form::label('id_first_name','First Name (Given Name)') !!}
    {!! Form::text('id_first_name',null,['class' => 'gui-input','id' => 'id_first_name','placeholder' => 'Must be written EXACTLY like the passport or visa name. ']) !!}
    <!---- ADD INPUT FOOTER form.inputfooter---->
    @include('_forms.input-footer',['title' => 'Note:','message' => 'Must be written EXACTLY like the passport or visa name.<br /><strong>ONLY PINYIN OR ENGLISH</strong>'])
    @include('_forms.end-new-label')
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->

    <!----------------------------------------------------------------------------->
    <!---------------------------New document file field----------------------------->
    @include(('_forms.new-section'))
        <label class="field prepend-icon append-button file">
            <span class="button">Choose File</span>
            {!! Form::file('document',['class' => 'gui-file','id' => 'file1']) !!}
            <input type="text" class="gui-input" id="uploader1" placeholder="Please Select A File">
            <label class="field-icon">
              <i class="fa fa-upload"></i>
            </label>
          </label>
    @include('_forms.end-new-section')
    <!----------------------------------------------------------------------------->
    <!----------------------------------------------------------------------------->


    {{-- HIDDEN INPUT NAME=table_type VALUE=$table_type ID=table_type  --}}
    {!! Form::hidden('table_type', $table_type,['id' => 'table_type']) !!}

    {{-- HIDDEN INPUT NAME=id VALUE=$id ID=id_number  --}}
    {!! Form::hidden('id', $id,['id' => 'id_number']) !!}

    @include('_forms.end-new-column')
    @include('_forms.end-new-row')
    @include('_forms.end-new-body')
    @include('_forms.end-new-head',['submit_title' => 'Update Identification','submit_name' => 'submit','submit_id' => ''])


@stop

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function () {

            $('#id_type').change(function () {
                show_dropdown(this.value);
            });

            function show_visa() {
                $('#display_visa_dropdown').show();
                $('#display_country_dropdown').hide();
                $('#display_idcard_dropdown').hide();
            }

            function show_country() {
                $('#display_visa_dropdown').hide();
                $('#display_idcard_dropdown').hide();
                $('#display_country_dropdown').show();
            }

            function show_idcard() {
                $('#display_idcard_dropdown').show();
                $('#display_visa_dropdown').hide();
                $('#display_country_dropdown').hide();
            }

            function show_dropdown($value) {
                switch ($value) {
                    case '1':
                        show_country();
                        break;
                    case '2':
                        show_idcard();
                        break;
                    case '3':
                        show_visa();
                        break;
                }
            }

            $('#file1').change(function(){
                $('#uploader1').val(this.value);
            });

            $('.date').mask('99/99/9999');

            $.validator.methods.smartCaptcha = function (value, element, param) {
                return value == param;
            };

            $("#admin-form").validate({

                /* validation states + elements
                 ------------------------------------------- */

                errorClass: "state-error",
                validClass: "state-success",
                errorElement: "em",

                /* validation rules
                 ------------------------------------------ */

                rules: {
                    id_number: {
                        required: true
                    },
                    id_first_name: {
                        required: true
                    },
                    id_last_name: {
                        required: true
                    },
                    file_upload: {
                        required: true
                    }


                },

                /* @validation error messages
                 ---------------------------------------------- */

                messages: {
                    id_number: {
                        required: "Please enter a valid ID number."
                    },
                    id_first_name: {
                        required: "Please enter a valid first name."
                    },
                    id_last_name: {
                        required: "Please enter a valid last name."
                    },
                    file_upload: {
                        required: "Please upload a file."
                    }
                },

                /* @validation highlighting + error placement
                 ---------------------------------------------------- */

                highlight: function (element, errorClass, validClass) {
                    $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                },
                errorPlacement: function (error, element) {
                    if (element.is(":radio") || element.is(":checkbox")) {
                        element.closest('.option-group').after(error);
                    } else {
                        error.insertAfter(element.parent());
                    }
                }

            });
        });

    </script>
@stop