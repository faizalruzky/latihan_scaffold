                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                       {!! Form::text("name", null, array("class" => "form-control", "id" => "name-field")) !!}
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('apple_type_id')) has-error @endif">
                       <label for="apple_type_id-field">Apple_type_name</label>
                       {!! Form::select("apple_type_id", $list["AppleType"], null, array("class" => "form-control", "id" => "apple_type_id-field")) !!}
                       @if($errors->has("apple_type_id"))
                        <span class="help-block">{{ $errors->first("apple_type_id") }}</span>
                       @endif
                    </div>