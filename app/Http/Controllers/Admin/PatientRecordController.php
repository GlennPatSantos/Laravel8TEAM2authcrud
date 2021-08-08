<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPatientRecordRequest;
use App\Http\Requests\StorePatientRecordRequest;
use App\Http\Requests\UpdatePatientRecordRequest;
use App\Models\PatientRecord;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientRecordController extends Controller
{
    public function index()
    {
        
        $patientRecords = PatientRecord::all();

        return view('admin.patientRecords.index', compact('patientRecords'));
    }

    public function create()
    {
        
        return view('admin.patientRecords.create');
    }

    public function store(StorePatientRecordRequest $request)
    {
        $patientRecord = PatientRecord::create($request->all());

        return redirect()->route('admin.patient-records.index');
    }

    public function edit(PatientRecord $patientRecord)
    {
        abort_if(Gate::denies('patient_record_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.patientRecords.edit', compact('patientRecord'));
    }

    public function update(UpdatePatientRecordRequest $request, PatientRecord $patientRecord)
    {
        $patientRecord->update($request->all());

        return redirect()->route('admin.patient-records.index');
    }

    public function show(PatientRecord $patientRecord)
    {
        abort_if(Gate::denies('patient_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.patientRecords.show', compact('patientRecord'));
    }

    public function destroy(PatientRecord $patientRecord)
    {
        abort_if(Gate::denies('patient_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patientRecord->delete();

        return back();
    }

    public function massDestroy(MassDestroyPatientRecordRequest $request)
    {
        PatientRecord::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}