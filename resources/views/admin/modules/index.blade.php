@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- Listing Page -->
        <div class="row listing-form">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title">🧾 {{ $module->name }}s List</h4>
                        </div>
                       
                            <a href="{{ route('admin.modules.records.create', $module->id) }}" class="btn btn-primary">Add {{ $module->name }}</a>
                       
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    @foreach($module->fields as $field)
                                        @if($field->table_show)  
                                            <th>{{ $field->label }}</th>
                                        @endif
                                    @endforeach
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $record)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @foreach($module->fields as $field)
                                            @if($field->table_show)   {{-- ✅ सिर्फ visible fields ही render होंगे --}}
                                                @php
                                                    $columnName = \Illuminate\Support\Str::snake($field->label);
                                                    $value = $record->$columnName ?? '';
                                                @endphp
                                                <td>
                                                    @if($field->type === 'file' && $value)
                                                        @php
                                                            $files = json_decode($value, true) ?: [$value];
                                                        @endphp
                                                        @foreach($files as $file)
                                                            <a href="{{ asset('storage/'.$file) }}" target="_blank">View File</a><br>
                                                        @endforeach

                                                    @elseif($field->type === 'dropdown' && $field->value_type == 'static')
                                                        @php
                                                            $fieldOptions = is_array($field->options) ? $field->options : json_decode($field->options, true);
                                                            $displayValue = is_array($value) ? implode(', ', $value) : $value;
                                                        @endphp
                                                        {{ $displayValue }}

                                                    @elseif($field->type === 'dropdown' && $field->value_type == 'dynamic' && !empty($field->options) && $value)
                                                        @php
                                                            $optionsData = is_array($field->options) ? $field->options : (json_decode($field->options, true) ?? []);
                                                            $displayText = '';
                                                            if (!empty($optionsData) && isset($optionsData[0])) {
                                                                $moduleId = (int) $optionsData[0];
                                                                $moduleResult = \DB::table('modules')->where('id', $moduleId)->first();
                                                                if ($moduleResult) {
                                                                    $tableName = strtolower($moduleResult->name) . 's';
                                                                    $moduleFieldsRaw = \DB::table('module_fields')->where('module_id', $moduleId)->get();
                                                                    $moduleFields = [];
                                                                    foreach ($moduleFieldsRaw as $fieldRow) {
                                                                        $moduleFields[] = strtolower(str_replace(' ', '_', $fieldRow->label));
                                                                    }
                                                                    $relatedRecord = \DB::table($tableName)->where('id', $value)->first();
                                                                    $displayText = $relatedRecord ? implode(' | ', array_map(function($label) use ($relatedRecord) {
                                                                        $columnName = strtolower(str_replace(' ', '_', $label));
                                                                        return $relatedRecord->$columnName ?? '';
                                                                    }, $moduleFields)) : '';
                                                                }
                                                            }
                                                        @endphp
                                                        {{ $displayText }}

                                                    @else
                                                        @php
                                                            $arr = json_decode($value, true);
                                                        @endphp
                                                        @if(is_array($arr))
                                                            {{ implode(', ', $arr) }}
                                                        @else
                                                            {{ $value }}
                                                        @endif
                                                    @endif
                                                </td>
                                            @endif
                                        @endforeach
                                        <td>
                                            @if($module->allow_edit)
                                                <a href="{{ route('admin.modules.records.edit', [$module->id, $record->id]) }}">
                                                    <button class="btn btn-light btn-sm edit-btn" data-bs-toggle="tooltip" title="Edit Record">
                                                        <i class="fas fa-pen text-warning"></i>
                                                    </button>
                                                </a>
                                            @endif
                                            @if($module->allow_delete)
                                                <form action="{{ route('admin.modules.records.destroy', [$module->id, $record->id]) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-light delete-btn" onclick="return confirm('Are you sure?')" title="Delete Record">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            @if($module->allow_show)
                                                <a href="{{ route('admin.modules.records.view', [$module->id, $record->id]) }}">
                                                    <button class="btn btn-light btn-sm edit-btn" data-bs-toggle="tooltip" title="View Record">
                                                        <i class="fas fa-eye text-primary"></i>
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ $module->fields->where('table_show', 1)->count() + 2 }}" class="text-center text-muted">
                                            No records found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection