{{--
REQUIRED
$submit_name = The returned form's name
$submit_title = The title(value) of the submit button
$submit_id = The ID of the submit button.

--}}

<!-- INSERT FOOTER AND BUTTONS -->
<div class="panel-footer text-right">
    {{--{!! Form::submit($submit_title,['class' => 'button btn-primary','name' => $submit_name,'id' => $submit_id]) !!}--}}
    @if(isset($extra_buttons) && count($extra_buttons) > 0)
        <div style="float: left">
        @foreach($extra_buttons as $button)
                {!! Form::button($button['title'],['class' => 'btn button btn-' . $button['color'],'type' => $button['type'], 'name' => $button['name']]) !!}
        @endforeach
        </div>
    @endif
    {!! Form::button($submit_title,['class' => 'btn button btn-primary','type' => 'submit','name' => $submit_name]) !!}
    {!! Form::button('Reset',['class' => 'btn button btn-danger','type' => 'reset']) !!}
</div>


{{--SEE IF THERE ARE ANY ERRORS ON THE FORM--}}

@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
{!! Form::close() !!}
    </div> <!--END PANEL-->
    </div> <!--END ADMIN-FORM-->








