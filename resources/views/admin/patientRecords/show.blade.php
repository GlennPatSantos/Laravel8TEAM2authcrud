@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('Patient Record') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.patient-records.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.patientRecord.fields.id') }}
                        </th>
                        <td>
                            {{ $patientRecord->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patientRecord.fields.name') }}
                        </th>
                        <td>
                            {{ $patientRecord->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patientRecord.fields.department') }}
                        </th>
                        <td>
                            {{ $patientRecord->department }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patientRecord.fields.employment_status') }}
                        </th>
                        <td>
                            {{ $patientRecord->employment_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.patientRecord.fields.status') }}
                        </th>
                        <td>
                            {{ $patientRecord->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.patient-records.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection