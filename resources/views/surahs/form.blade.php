    	<div class="form-group" >
            {!! Form::label("nama_surat", "Nama_surat:") !!}
            {!! Form::text("nama_surat", null, ["class" => "form-control"]) !!}
        </div>
            

    	<div class="form-actions">
            <button type="submit" name="submit" class="btn btn-primary">{!! $submitText !!}</button>
    	</div>