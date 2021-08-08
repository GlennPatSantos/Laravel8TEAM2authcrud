@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.patient-records.create') }}">
                {{ trans('Add') }} {{ trans('Records') }}
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('Patients List') }} 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PatientRecord">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('Id') }}
                        </th>
                        <th>
                            {{ trans('Name') }}
                        </th>
                        <th>
                            {{ trans('Department') }}
                        </th>
                        <th>
                            {{ trans('Employment Status') }}
                        </th>
                        <th>
                            {{ trans('Status') }}
                        </th>
                        <th>
                            {{ trans('Created at') }}
                        </th>
                        <th>
                            {{ trans('Updated at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patientRecords as $key => $patientRecord)
                        <tr data-entry-id="{{ $patientRecord->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $patientRecord->id ?? '' }}
                            </td>
                            <td>
                                {{ $patientRecord->name ?? '' }}
                            </td>
                            <td>
                                {{ $patientRecord->department ?? '' }}
                            </td>
                            <td>
                                {{ $patientRecord->employment_status ?? '' }}
                            </td>
                            <td>
                                {{ $patientRecord->status ?? '' }}
                            </td>
                            <td>
                                {{ $patientRecord->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $patientRecord->updated_at ?? '' }}
                            </td>
                            <td>
                
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.patient-records.show', $patientRecord->id) }}">
                                        {{ trans('View') }}
                                    </a>
                                

                              
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.patient-records.edit', $patientRecord->id) }}">
                                        {{ trans('Edit') }}
                                    </a>
                               

                             
                                    <form action="{{ route('admin.patient-records.destroy', $patientRecord->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('Delete') }}">
                                    </form>
                               

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('patient_record_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.patient-records.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-PatientRecord:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection