@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('Patient Record') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.patient-records.update", [$patientRecord->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.patientRecord.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $patientRecord->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patientRecord.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="department">{{ trans('cruds.patientRecord.fields.department') }}</label>
                <input class="form-control {{ $errors->has('department') ? 'is-invalid' : '' }}" type="text" name="department" id="department" value="{{ old('department', $patientRecord->department) }}" required>
                @if($errors->has('department'))
                    <div class="invalid-feedback">
                        {{ $errors->first('department') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patientRecord.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="employment_status">{{ trans('cruds.patientRecord.fields.employment_status') }}</label>
                <input class="form-control {{ $errors->has('employment_status') ? 'is-invalid' : '' }}" type="text" name="employment_status" id="employment_status" value="{{ old('employment_status', $patientRecord->employment_status) }}" required>
                @if($errors->has('employment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patientRecord.fields.employment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.patientRecord.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $patientRecord->status) }}" required>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.patientRecord.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
